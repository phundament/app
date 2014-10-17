<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=p4',
            'username' => 'dev',
            'password' => 'dev123',
            'charset' => 'utf8',
        ],
        'db_test' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=p4_test',
            'username' => 'dev',
            'password' => 'dev123',
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
