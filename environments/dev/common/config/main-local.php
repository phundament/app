<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=p4', #value:components.db.dsn#
            'username' => 'dev', #value:components.db.username#
            'password' => 'dev123', #value:components.db.password#
            'charset' => 'utf8',
        ],
        'db_test' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=p4_test', #value:components.db_test.dsn#
            'username' => 'travis', #value:components.db_test.username#
            'password' => '', #value:components.db_test.password#
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
