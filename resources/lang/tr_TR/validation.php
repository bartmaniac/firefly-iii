<?php

/**
 * validation.php
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

return [
    'iban'                           => 'Bu geçerli bir IBAN değil.',
    'source_equals_destination'      => 'The source account equals the destination account.',
    'unique_account_number_for_user' => 'Bu hesap numarası zaten kullanılmaktadır.',
    'unique_iban_for_user'           => 'Bu IBAN numarası zaten kullanılmaktadır.',
    'deleted_user'                   => 'Güvenlik kısıtlamaları nedeniyle, bu e-posta adresini kullanarak kayıt yapamazsınız.',
    'rule_trigger_value'             => 'Bu eylem, seçili işlem için geçersizdir.',
    'rule_action_value'              => 'Bu eylem seçili işlem için geçersizdir.',
    'file_already_attached'          => 'Yüklenen dosya ":name" zaten bu nesneye bağlı.',
    'file_attached'                  => '":name" dosyası başarıyla yüklendi.',
    'must_exist'                     => 'ID alanı :attribute veritabanın içinde yok.',
    'all_accounts_equal'             => 'Bu alandaki tüm hesapları eşit olmalıdır.',
    'invalid_selection'              => 'Your selection is invalid.',
    'belongs_user'                   => 'Bu değer bu alan için geçerli değil.',
    'at_least_one_transaction'       => 'En az bir işlem gerekir.',
    'at_least_one_repetition'        => 'Need at least one repetition.',
    'require_repeat_until'           => 'Require either a number of repetitions, or an end date (repeat_until). Not both.',
    'require_currency_info'          => 'Bu alanın içeriği para birimi bilgileri geçersiz.',
    'equal_description'              => 'İşlem açıklaması genel açıklama eşit değildir.',
    'file_invalid_mime'              => '":name" dosyası ":mime" türünde olup yeni bir yükleme olarak kabul edilemez.',
    'file_too_large'                 => '":name" dosyası çok büyük.',
    'belongs_to_user'                => 'The value of :attribute is unknown.',
    'accepted'                       => ':attribute kabul edilmek zorunda.',
    'bic'                            => 'Bu BIC geçerli değilrdir.',
    'at_least_one_trigger'           => 'Rule must have at least one trigger.',
    'at_least_one_action'            => 'Rule must have at least one action.',
    'base64'                         => 'Bu geçerli Base64 olarak kodlanmış veri değildir.',
    'model_id_invalid'               => 'Verilen kimlik bu model için geçersiz görünüyor.',
    'more'                           => ':attribute must be larger than zero.',
    'less'                           => ':attribute must be less than 10,000,000',
    'active_url'                     => ':attribute geçerli bir URL değil.',
    'after'                          => ':attribute :date tarihinden sonrası için tarihlendirilmelidir.',
    'alpha'                          => ':attribute sadece harf içerebilir.',
    'alpha_dash'                     => ':attribute sadece harf, sayı ve kısa çizgi içerebilir.',
    'alpha_num'                      => ':attribute sadece harf ve sayı içerebilir.',
    'array'                          => ':attribute bir dizi olmalıdır.',
    'unique_for_user'                => ':attribute\'de zaten bir girdi var.',
    'before'                         => ':attribute :date tarihinden öncesi için tarihlendirilmelidir.',
    'unique_object_for_user'         => 'This name is already in use.',
    'unique_account_for_user'        => 'This account name is already in use.',
    'between.numeric'                => ':attribute :min ve :max arasında olmalıdır.',
    'between.file'                   => ':attribute, :min kilobayt ve :max kilobayt arasında olmalıdır.',
    'between.string'                 => ':attribute :min karakter ve :max karakter olmalıdır.',
    'between.array'                  => ':attribute :min öğe ve :max öğe olmalıdır.',
    'boolean'                        => ':attribute alanının doğru veya yanlış olması gerekir.',
    'confirmed'                      => ':attribute doğrulaması eşleşmiyor.',
    'date'                           => ':attribute geçerli bir tarih değil.',
    'date_format'                    => ':attribute :format formatına uymuyor.',
    'different'                      => ':attribute ve :other farklı olmalı.',
    'digits'                         => ':attribute :digits basamak olmalıdır.',
    'digits_between'                 => ':attribute en az :min basamak en fazla :max basamak olmalı.',
    'email'                          => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'filled'                         => ':attribute alanı gereklidir.',
    'exists'                         => 'Seçili :attribute geçersiz.',
    'image'                          => ':attribute bir resim olmalı.',
    'in'                             => 'Seçili :attribute geçersiz.',
    'integer'                        => ':attribute bir tamsayı olmalı.',
    'ip'                             => ':attribute geçerli bir IP adresi olmalı.',
    'json'                           => ':attribute geçerli bir JSON dizini olmalı.',
    'max.numeric'                    => ':attribute, :max değerinden daha büyük olamamalıdır.',
    'max.file'                       => ':attribute :max kilobayttan büyük olmamalıdır.',
    'max.string'                     => ':attribute :max karakterden büyük olmamalıdır.',
    'max.array'                      => ':attribute :max öğeden daha fazlasına sahip olamaz.',
    'mimes'                          => ':attribute :values türünde bir dosya olmalı.',
    'min.numeric'                    => ':attribute en az :min olmalıdır.',
    'lte.numeric'                    => 'The :attribute must be less than or equal :value.',
    'min.file'                       => ':attribute en az :min kilobayt olmalıdır.',
    'min.string'                     => ':attribute en az :min karakter olmalıdır.',
    'min.array'                      => ':attribute en az :min öğe içermelidir.',
    'not_in'                         => 'Seçili :attribute geçersiz.',
    'numeric'                        => ':attribute sayı olmalıdır.',
    'numeric_native'                 => 'The native amount must be a number.',
    'numeric_destination'            => 'The destination amount must be a number.',
    'numeric_source'                 => 'The source amount must be a number.',
    'regex'                          => ':attribute biçimi geçersiz.',
    'required'                       => ':attribute alanı gereklidir.',
    'required_if'                    => ':other :value iken :attribute alanı gereklidir.',
    'required_unless'                => ':other :values içinde değilse :attribute alanı gereklidir.',
    'required_with'                  => ':values mevcutken :attribute alanı gereklidir.',
    'required_with_all'              => ':values mevcutken :attribute alanı gereklidir.',
    'required_without'               => ':values mevcut değilken :attribute alanı gereklidir.',
    'required_without_all'           => 'Hiçbir :values mevcut değilken :attribute alanı gereklidir.',
    'same'                           => ':attribute ve :other eşleşmelidir.',
    'size.numeric'                   => ':attribute :size olmalıdır.',
    'amount_min_over_max'            => 'En az  tutar en fazla tutardan büyük olamaz.',
    'size.file'                      => ':attribute :size kilobyte olmalıdır.',
    'size.string'                    => ':attribute :size karakter olmalıdır.',
    'size.array'                     => ':attribute :size öğeye sahip olmalıdır.',
    'unique'                         => ':attribute zaten alınmış.',
    'string'                         => ':attribute bir dizi olmalıdır.',
    'url'                            => ':attribute biçimi geçersiz.',
    'timezone'                       => ':attribute geçerli bir bölge olmalıdır.',
    '2fa_code'                       => ':attribute alanı geçersiz.',
    'dimensions'                     => ':attribute geçersiz görüntü boyutlarına sahip.',
    'distinct'                       => ':attribute alanı yinelenen bir değere sahip.',
    'file'                           => ':attribute bir dosya olmalıdır.',
    'in_array'                       => ':attribute alanı :other içinde olamaz.',
    'present'                        => ':attribute alanı mevcut olmalıdır.',
    'amount_zero'                    => 'The total amount cannot be zero.',
    'unique_piggy_bank_for_user'     => 'Kumbara adı benzersiz olmalıdır.',
    'secure_password'                => 'This is not a secure password. Please try again. For more information, visit http://bit.ly/FF3-password-security.',
    'valid_recurrence_rep_type'      => 'Invalid repetition type for recurring transactions.',
    'valid_recurrence_rep_moment'    => 'Invalid repetition moment for this type of repetition.',
    'invalid_account_info'           => 'Invalid account information.',
    'attributes'                     => [
        'email'                   => 'E-posta adresi',
        'description'             => 'Açıklama',
        'amount'                  => 'Tutar',
        'name'                    => 'adı',
        'piggy_bank_id'           => 'Kumbara ID',
        'targetamount'            => 'Hedef tutar',
        'openingBalanceDate'      => 'Açılış bakiyesi',
        'openingBalance'          => 'Açılış bakiyesi',
        'match'                   => 'Eşleşme',
        'amount_min'              => 'Minimum tutar',
        'amount_max'              => 'Maksimum tutar',
        'title'                   => 'başlık',
        'tag'                     => 'etiket',
        'transaction_description' => 'İşlem Açıklaması',
        'rule-action-value.1'     => 'kural eylemi değer #1',
        'rule-action-value.2'     => 'kural eylemi değer #1',
        'rule-action-value.3'     => 'kural eylem değeri #3',
        'rule-action-value.4'     => 'kural eylem değeri #4',
        'rule-action-value.5'     => 'kural eylem değeri #5',
        'rule-action.1'           => 'kural eylemi #1',
        'rule-action.2'           => 'kural eylemi #2',
        'rule-action.3'           => 'kural eylemi #3',
        'rule-action.4'           => 'kural eylemi #4',
        'rule-action.5'           => 'kural eylemi #5',
        'rule-trigger-value.1'    => 'kural tetikleyici değeri #1',
        'rule-trigger-value.2'    => 'kural tetikleyici değeri #2',
        'rule-trigger-value.3'    => 'kural tetikleyici değeri #3',
        'rule-trigger-value.4'    => 'kural tetikleyici değeri #4',
        'rule-trigger-value.5'    => 'kural tetikleyici değeri #5',
        'rule-trigger.1'          => 'kural tetikleyici #1',
        'rule-trigger.2'          => 'kural tetikleyici #2',
        'rule-trigger.3'          => 'kural tetikleyici #3',
        'rule-trigger.4'          => 'kural tetikleyici #4',
        'rule-trigger.5'          => 'kural tetikleyici #5',
    ],
];
