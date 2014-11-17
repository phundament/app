<?php
return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components'          => [
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
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => getenv('APP_COOKIE_VALIDATION_KEY'),
        ],
        'assetManager' => [
            'forceCopy' => YII_DEBUG ? true : false,
            'bundles'   => [
                'yii\bootstrap\BootstrapAsset' => false, // provided by frontend/assets/web/app.css
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => getenv('APP_PRETTY_URLS') ? true : false,
            'showScriptName' => false,
            'rules' => [
                'docs/<file:[a-z0-9\-\.]+>' => 'site/docs',
                'docs' => 'site/docs'
            ],
        ],
        'view'         => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
    ],
    'modules'             => [
        'user' => [
            'layout' => '@frontend/views/layouts/container',
        ],
    ],
    'params'              => [
    ],
];
