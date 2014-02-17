<?php

$params = require(__DIR__ . '/params.php');
$db     = require(__DIR__ . '/db.php');

$config = [
    'id'             => 'basic',
    'sourceLanguage' => 'en',
    'language'       => 'en',
    'basePath'       => dirname(__DIR__),
    'extensions'     => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'components'     => [
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail'         => [
            'class'            => 'yii\swiftmailer\Mailer',
            'useFileTransport' => YII_DEBUG,
            'messageConfig'    => [
                'from' => 'noreply@yoursite.com',
            ],
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => $db,
    ],
    'modules'        => [
        'packaii' => ['class' => 'schmunk42\packaii\Module'],
        'usr'     => [
            'class' => 'nineinchnick\usr\Module',
        ],
    ],
    'params'         => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['preload'][]        = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
        'panels'     => [
            'app'       => ['class' => 'app\panels\AppPanel',],
            'config'    => ['class' => 'yii\debug\panels\ConfigPanel'],
            'request'   => ['class' => 'yii\debug\panels\RequestPanel'],
            'log'       => ['class' => 'yii\debug\panels\LogPanel'],
            'profiling' => ['class' => 'yii\debug\panels\ProfilingPanel'],
            'db'        => ['class' => 'yii\debug\panels\DbPanel'],
        ]
    ];

    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
        'generators' => [
            'giiant' => ['class' => 'schmunk42\giiant\crud\Generator']
        ]
    ];

    // alias for gii
    $config['aliases']['schmunk42/packaii'] = '@vendor/schmunk42/yii2-packaii';
}

return $config;
