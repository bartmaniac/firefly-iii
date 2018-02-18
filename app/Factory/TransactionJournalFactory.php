<?php
/**
 * TransactionJournalFactory.php
 * Copyright (c) 2018 thegrumpydictator@gmail.com
 *
 * This file is part of Firefly III.
 *
 * Firefly III is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Firefly III is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Firefly III. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Factory;

use FireflyIII\Exceptions\FireflyException;
use FireflyIII\Models\Bill;
use FireflyIII\Models\PiggyBank;
use FireflyIII\Models\TransactionJournal;
use FireflyIII\Models\TransactionType;
use FireflyIII\Repositories\Bill\BillRepositoryInterface;
use FireflyIII\Repositories\Journal\JournalRepositoryInterface;
use FireflyIII\Repositories\PiggyBank\PiggyBankRepositoryInterface;
use FireflyIII\Repositories\TransactionType\TransactionTypeRepositoryInterface;
use FireflyIII\User;

/**
 * Class TransactionJournalFactory
 */
class TransactionJournalFactory
{
    /** @var BillRepositoryInterface */
    private $billRepository;
    /** @var PiggyBankRepositoryInterface */
    private $piggyRepository;
    /** @var JournalRepositoryInterface */
    private $repository;
    /** @var TransactionTypeRepositoryInterface */
    private $ttRepository;
    /** @var User */
    private $user;

    /**
     * TransactionJournalFactory constructor.
     */
    public function __construct()
    {
        $this->repository      = app(JournalRepositoryInterface::class);
        $this->billRepository  = app(BillRepositoryInterface::class);
        $this->piggyRepository = app(PiggyBankRepositoryInterface::class);
        $this->ttRepository    = app(TransactionTypeRepositoryInterface::class);

    }

    /**
     * Create a new transaction journal and associated transactions.
     *
     * @param array $data
     *
     * @return TransactionJournal
     * @throws FireflyException
     */
    public function create(array $data): TransactionJournal
    {
        $type            = $this->findTransactionType($data['type']);
        //$bill            = $this->findBill($data['bill_id'], $data['bill_name']);
        //$piggyBank       = $this->findPiggyBank($data['piggy_bank_id'], $data['piggy_bank_name']);
        $defaultCurrency = app('amount')->getDefaultCurrencyByUser($this->user);
        $values          = [
            'user_id'                 => $data['user'],
            'transaction_type_id'     => $type->id,
            'bill_id'                 => is_null($bill) ? null : $bill->id,
            'transaction_currency_id' => $defaultCurrency->id,
            'description'             => $data['description'],
            'date'                    => $data['date']->format('Y-m-d'),
            'order'                   => 0,
            'tag_count'               => 0,
            'completed'               => 0,
        ];

        $journal = $this->repository->storeBasic($values);

        $factory = app(TransactionFactory::class);
        $factory->setUser($this->user);

        /** @var array $trData */
        foreach ($data['transactions'] as $trData) {
            $trData['reconciled'] = $data['reconciled'] ?? false;
            $factory->createPair($journal, $trData);
        }
        $this->repository->markCompleted($journal);

        // link piggy bank:
        if ($type->type === TransactionType::TRANSFER && !is_null($piggyBank)) {
            /** @var PiggyBankEventFactory $factory */
            $factory = app(PiggyBankEventFactory::class);
            $factory->create($journal, $piggyBank);
        }

        // store tags and link them:
        /** @var TagFactory $factory */
        $factory = app(TagFactory::class);
        $factory->setUser($journal->user);
        foreach ($data['tags'] as $string) {
            $tagData = [
                'tag'         => $string,
                'date'        => null,
                'description' => null,
                'latitude'    => null,
                'longitude'   => null,
                'zoom_level'  => null,
                'user'        => $journal->user,
            ];
            $tag     = $factory->create($tagData);
            $this->repository->addTag($journal, $tag);
        }

        return $journal;
    }

    /**
     * Set the user.
     *
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
        $this->repository->setUser($user);
        $this->billRepository->setUser($user);
        $this->piggyRepository->setUser($user);
    }

    /**
     * Find the given bill based on the ID or the name. ID takes precedence over the name.
     *
     * @param int    $billId
     * @param string $billName
     *
     * @return Bill|null
     */
    protected function findBill(int $billId, string $billName): ?Bill
    {
        if (strlen($billName) === 0 && $billId === 0) {
            return null;
        }
        // first find by ID:
        if ($billId > 0) {
            /** @var Bill $bill */
            $bill = $this->billRepository->find($billId);
            if (!is_null($bill)) {
                return $bill;
            }
        }

        // then find by name:
        if (strlen($billName) > 0) {
            $bill = $this->billRepository->findByName($billName);
            if (!is_null($bill)) {
                return $bill;
            }
        }

        return null;
    }

    /**
     * Find the given bill based on the ID or the name. ID takes precedence over the name.
     *
     * @param int    $piggyBankId
     * @param string $piggyBankName
     *
     * @return PiggyBank|null
     */
    protected function findPiggyBank(int $piggyBankId, string $piggyBankName): ?PiggyBank
    {
        if (strlen($piggyBankName) === 0 && $piggyBankId === 0) {
            return null;
        }
        // first find by ID:
        if ($piggyBankId > 0) {
            /** @var PiggyBank $piggyBank */
            $piggyBank = $this->piggyRepository->find($piggyBankId);
            if (!is_null($piggyBank)) {
                return $piggyBank;
            }
        }


        // then find by name:
        if (strlen($piggyBankName) > 0) {
            /** @var PiggyBank $piggyBank */
            $piggyBank = $this->piggyRepository->findByName($piggyBankName);
            if (!is_null($piggyBank)) {
                return $piggyBank;
            }
        }

        return null;
    }

    /**
     * Get the transaction type. Since this is mandatory, will throw an exception when nothing comes up. Will always
     * use TransactionType repository.
     *
     * @param string $type
     *
     * @return TransactionType
     * @throws FireflyException
     */
    protected function findTransactionType(string $type): TransactionType
    {
        $transactionType = $this->ttRepository->findByType($type);
        if (is_null($transactionType)) {
            throw new FireflyException(sprintf('Could not find transaction type for "%s"', $type));
        }

        return $transactionType;
    }

}