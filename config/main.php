<?php

$config = [
    'id'         => 'app',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@admin-views' => '@app/modules/admin/views'
    ],
    'components' => [
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'db'           => [
            'class'       => 'yii\db\Connection',
            'dsn'         => getenv('DATABASE_DSN'),
            'username'    => getenv('DATABASE_USER'),
            'password'    => getenv('DATABASE_PASSWORD'),
            'charset'     => 'utf8',
            'tablePrefix' => getenv('DATABASE_TABLE_PREFIX'),
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
        'assetManager' => [
            'forceCopy'  => false, // Note: May degrade performance with Docker or VMs
            'linkAssets' => false, // Note: May also publish files, which are excluded in an asset bundle
            'bundles'    => [
                #'yii\bootstrap\BootstrapAsset' => false, // provided by frontend/assets/web/app.css
            ],
        ],
        'urlManager'   => [
            'enablePrettyUrl' => getenv('APP_PRETTY_URLS') ? true : false,
            'showScriptName'  => false,
            'rules'           => [
                'docs/<file:[a-z0-9\-\.]*>' => 'site/docs',
                'docs'                      => 'site/docs'
            ],
        ],
        'view'         => [
            'theme' => [
                'pathMap' => [
                    '@vendor/dektrium/yii2-user/views' => '@app/views/user',
                    '@yii/gii/views/layouts'           => '@admin-views/layouts',
                ],
            ],
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            //'viewPath'         => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => YII_ENV_PROD ? false : true,
        ],

    ],
    'modules'    => [
        'admin'   => [
            'class'  => 'app\modules\admin\Module',
            'layout' => '@admin-views/layouts/main',
        ],
        'user'    => [
            'class'        => 'dektrium\user\Module',
            'layout'       => '@admin-views/layouts/main',
            'defaultRoute' => 'profile',
            'admins'       => ['admin']
        ],
        'packaii' => [
            'class'  => \schmunk42\packaii\Module::className(),
            'layout' => '@admin-views/layouts/main',
        ],

    ],
    'params'     => [
        'appName'      => getenv('APP_NAME'),
        'adminEmail'   => getenv('APP_ADMIN_EMAIL'),
        'supportEmail' => getenv('APP_SUPPORT_EMAIL'),
        'copyrightBy'  => getenv('APP_COPYRIGHT'),
    ]

];

if (PHP_SAPI != 'cli') {

    // web application settings

    $config['components']['request']['cookieValidationKey'] = getenv('APP_COOKIE_VALIDATION_KEY');

    $config['components']['user'] = [
        # Note: identityClass is configured from dektrium\user
        'enableAutoLogin' => true,
    ];

    $config['components']['errorHandler'] = [
        'errorAction' => 'site/error',
    ];

} else {

    // console application settings

}

if (YII_ENV_DEV) {

    // configuration adjustments for 'dev' environment

    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
