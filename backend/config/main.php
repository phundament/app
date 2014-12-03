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
                    '@app/views'     => '@vendor/dmstr/yii2-adminlte-asset/example-views/phundament/app',
                    '@yii/gii/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/phundament/app',
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
            'cookieValidationKey' => getenv('APP_COOKIE_VALIDATION_KEY'),
        ],
        'assetManager' => [
            'forceCopy' => false, // Note: May degrade performance with Docker or VMs
            'linkAssets' => false, // Note: May also publish files, which are excluded in an asset bundle
        ],
    ],
    'params'              => [
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment

}

return $config;
