<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . DATABASE_HOST . (defined('DATABASE_PORT') && DATABASE_PORT != '' ? ';port=' . DATABASE_PORT : '') . ';dbname=' . DATABASE_NAME,
            'username' => DATABASE_USER,
            'password' => DATABASE_PASSWORD,
            'charset' => 'utf8',
        ],
        'db_test' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . TEST_DB_HOST . (defined('TEST_DB_PORT') && TEST_DB_PORT != '' ? ';port=' . TEST_DB_PORT : '') . ';dbname=' . TEST_DB_NAME,
            'username' => TEST_DB_USER,
            'password' => TEST_DB_PASSWORD,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
