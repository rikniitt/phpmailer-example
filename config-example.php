<?php

return [
    'mailer' => [
        'host' => 'localhost',
        'username' => 'user',
        'password' => 'pass',
        'secure' => PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS,
        'port' => 25,
    ],

    'sender' => 'php-mailer@example.org',
    'receiver' => 'sales@example.org',
];
