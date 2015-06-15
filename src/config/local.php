<?php

return [
    'components' => [
        'dbSakila' => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=sakila',
            'username' => 'dev',
            'password' => 'dev123',
            'charset'  => 'utf8',
        ],
    ]
];