<?php

$params = require(__DIR__ . '/params.php');
$db     = require(__DIR__ . '/db.php');

$web = [
    'id'             => 'phundament-4',
    'name'           => 'Phundament 4',
    'sourceLanguage' => 'en',
    'language'       => 'en',
    'basePath'       => dirname(__DIR__),
    'extensions'     => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'aliases'        => [
        '@root'   => realpath(__DIR__ . '/../../'),
        '@app'    => realpath(__DIR__ . '/..'),
        '@vendor' => realpath(__DIR__ . '/../../vendor')
    ],
    'components'     => [
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'db'           => $db,
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
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
    ],
    'modules'        => [
        'packaii' => [
            'class' => 'schmunk42\packaii\Module'
        ],
    ],
    'params'         => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $web['preload'][]        = 'debug';
    $web['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
        'panels'     => [
            'app'       => ['class' => 'app\panels\AppPanel',],
            'packaii'   => ['class' => 'schmunk42\packaii\panels\PackaiiPanel',],
            'config'    => ['class' => 'yii\debug\panels\ConfigPanel'],
            'request'   => ['class' => 'yii\debug\panels\RequestPanel'],
            'log'       => ['class' => 'yii\debug\panels\LogPanel'],
            'profiling' => ['class' => 'yii\debug\panels\ProfilingPanel'],
            'db'        => ['class' => 'yii\debug\panels\DbPanel'],
        ]
    ];

    // gii config
    $web['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.33.1'],
        'generators' => [
            'giiant-crud'  => [
                'class' => 'schmunk42\giiant\crud\Generator'
            ],
            'giiant-model' => [
                'class' => 'schmunk42\giiant\model\Generator'
            ],
        ]
    ];
}

return $web;
