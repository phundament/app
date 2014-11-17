<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache'  => [
            'class' => 'yii\caching\FileCache',
        ],
        'db'     => [
            'class'       => 'yii\db\Connection',
            'dsn'         => getenv('DATABASE_DSN'),
            'username'    => getenv('DATABASE_USER'),
            'password'    => getenv('DATABASE_PASSWORD'),
            'charset'     => 'utf8',
            'tablePrefix' => getenv('DATABASE_TABLE_PREFIX'),
        ],
        'db_test' => [
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
            'useFileTransport' => YII_ENV_PROD ? false: true,
        ],
        /*'log'    => [
            'targets'    => [
                [
                    'class'   => 'yii\log\FileTarget',
                    'levels'  => ['error', 'warning', 'info', 'trace'],
                    'logFile' => '@app/runtime/debug.log',
                    'enabled' => YII_DEBUG ? true : false,
                ],
            ],
        ],*/
    ],
    'modules'    => [
        'user' => [
            'class'        => 'dektrium\user\Module',
            'defaultRoute' => 'profile',
            'admins'       => ['admin']
        ]
    ],
    'params'     => [
        'appName'      => getenv('APP_NAME'),
        'adminEmail'   => getenv('APP_ADMIN_EMAIL'),
        'supportEmail' => getenv('APP_SUPPORT_EMAIL'),
        'copyrightBy'  => getenv('APP_COPYRIGHT'),
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;