<?php

$config = [
    'id'                  => 'app-backend',
    'basePath'            => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap'           => ['log'],
    'modules'             => [
    ],
    'components'          => [
        'view'         => [
            'theme' => [
                'pathMap' => [
                    '@app/views'     => '@vendor/dmstr/yii2-adminlte-asset/phundament4',
                    '@yii/gii/views' => '@vendor/dmstr/yii2-adminlte-asset/phundament4',
                ],
            ],
        ],
        'user'         => [
            # Note: identityClass is configured from dektrium\user
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'assetManager' => [
            'forceCopy' => YII_DEBUG ? true : false,
        ],
    ],
    'params'              => [
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment

}

return $config;