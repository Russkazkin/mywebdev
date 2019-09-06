<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'formattedLanguages' => [
        'en-US' => [
            'locale' => 'en_US',
            'calendar' => '',
        ],
        'ru-RU' => [
            'locale' => 'ru_RU.UTF-8, ru_RU',
            'calendar' => IntlDateFormatter::create('ru_RU', 1,1)
        ]
    ]
];
