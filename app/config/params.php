<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'formattedLanguages' => [
        'en-US' => [
            'locale' => 'en_US',
            'calendar' => IntlDateFormatter::GREGORIAN,
            'dateFormat' => 'php:m-d-Y'
        ],
        'ru-RU' => [
            'locale' => 'ru_RU.UTF-8, ru_RU',
            'calendar' => IntlDateFormatter::GREGORIAN,
            'dateFormat' => 'php:d/m/Y'
        ]
    ],
    'bsVersion' => '4.x',
];
