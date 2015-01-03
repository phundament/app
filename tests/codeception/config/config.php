<?php
/**
 * Application configuration shared by all test types
 */
return [
    'components' => [
        /*'db'           => [
            'class'       => 'yii\db\Connection',
            'dsn'         => getenv('DATABASE_DSN'),
            'username'    => getenv('DATABASE_USER'),
            'password'    => getenv('DATABASE_PASSWORD'),
            'charset'     => 'utf8',
            'tablePrefix' => getenv('DATABASE_TABLE_PREFIX'),
        ],*/
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            #'showScriptName' => true,
            #'enablePrettyUrl' => false,
        ],
        'request' => [
            #'class' => 'yii\web\Request',
            #'baseUrl' => 'http://localhost',
           'cookieValidationKey' => getenv('APP_COOKIE_VALIDATION_KEY')
        ]
    ],
];
