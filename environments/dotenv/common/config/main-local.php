<?php
return [
    'components' => [
        'db'     => [
            'class'       => 'yii\db\Connection',
            'dsn'         => getenv('DATABASE_DSN'),
            'username'    => getenv('DATABASE_USER'),
            'password'    => getenv('DATABASE_PASSWORD'),
            'charset'     => 'utf8',
            'tablePrefix' => getenv('DATABASE_TABLE_PREFIX'),
        ],
        'dbTest'     => [
            'class'       => 'yii\db\Connection',
            'dsn'         => getenv('TEST_DATABASE_DSN'),
            'username'    => getenv('TEST_DATABASE_USER'),
            'password'    => getenv('TEST_DATABASE_PASSWORD'),
            'charset'     => 'utf8',
            'tablePrefix' => getenv('TEST_DATABASE_TABLE_PREFIX'),
        ],
        'mailer' => [
            'class'            => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
