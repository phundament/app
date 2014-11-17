<?php
/**
 * Application configuration shared by all applications and test types
 */
return [
    'components' => [
        'db' => [
            'dsn'         => getenv('TEST_DATABASE_DSN'),
            'username'    => getenv('TEST_DATABASE_USER'),
            'password'    => getenv('TEST_DATABASE_PASSWORD'),
            'tablePrefix' => getenv('TEST_DATABASE_TABLE_PREFIX'),
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
