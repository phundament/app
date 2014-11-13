<?php

$config = [
    'id'                  => 'app-console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => [
        'log'
    ],
    'controllerNamespace' => 'console\controllers',
    'controllerMap'       => [
        'app'     => 'console\\controllers\\AppController',
        'migrate' => 'dmstr\\console\\controllers\\MigrateController',
    ],
    'modules'             => [
    ],
    'components'          => [
        'log' => [
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params'              => [
        'yii.migrations' => [
            '@dektrium/user/migrations'
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
}

return $config;