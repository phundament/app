<?php

$config = [
    'id'         => 'app',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@admin-views' => '@app/modules/admin/views'
    ],
    'components' => [
        'assetManager' => [
            'forceCopy'  => false, // Note: May degrade performance with Docker or VMs
            'linkAssets' => false, // Note: May also publish files, which are excluded in an asset bundle
            'dirMode'    => 0777,
            'bundles'    => [
                #'yii\bootstrap\BootstrapAsset' => false, // provided by frontend/assets/web/app.css
            ],
        ],
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
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            //'viewPath'         => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => YII_ENV_PROD ? false : true,
        ],
        'urlManager'   => [
            'enablePrettyUrl' => getenv('APP_PRETTY_URLS') ? true : false,
            'showScriptName'  => getenv('YII_ENV_TEST') ? true : false,
            'rules'           => [
                'docs/<file:[a-zA-Z0-9_\-\.]*>' => 'docs',
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

    ],
    'modules'    => [
        'admin'   => [
            'class'  => 'app\modules\admin\Module',
            'layout' => '@admin-views/layouts/main',
        ],
        'docs'    => [
            'class'  => \schmunk42\markdocs\Module::className(),
            'layout' => '@app/views/layouts/container',
        ],
        'packaii' => [
            'class'  => \schmunk42\packaii\Module::className(),
            'layout' => '@admin-views/layouts/main',
        ],
        'user'    => [
            'class'        => 'dektrium\user\Module',
            'layout'       => '@admin-views/layouts/main',
            'defaultRoute' => 'profile',
            'admins'       => ['admin']
        ],
    ],
    'params'     => [
        'appName'        => getenv('APP_NAME'),
        'adminEmail'     => getenv('APP_ADMIN_EMAIL'),
        'supportEmail'   => getenv('APP_SUPPORT_EMAIL'),
        'copyrightBy'    => getenv('APP_COPYRIGHT'),
        'yii.migrations' => [
            '@dektrium/user/migrations',
        ]
    ]

];


$web = [
    'components' => [
        'log'     => [
            'traceLevel' => getenv('YII_TRACE_LEVEL'),
            'targets'    => [
                // log route handled by nginx process
                [
                    'class'   => 'dmstr\log\SyslogTarget',
                    'prefix'  => function () {
                        return '';
                    },
                    'levels'  => YII_DEBUG ? ['error', 'warning', 'info'] : ['error', 'warning'],
                    'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION'],
                    'enabled' => YII_DEBUG ? true : false,
                ],
                // standard file log route
                [
                    'class'   => 'yii\log\FileTarget',
                    'levels'  => YII_DEBUG ? ['error', 'warning', 'info'] : ['error', 'warning'],
                    'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION'],
                    'logFile' => '@app/runtime/logs/web.log',
                    'dirMode' => 0777
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => getenv('APP_COOKIE_VALIDATION_KEY'),
        ],
        'user'    => [
            'identityClass' => 'dektrium\user\models\User',
        ],
    ]
];


$console = [
    'controllerNamespace' => 'app\commands',
    'controllerMap'       => [
        'migrate' => 'dmstr\console\controllers\MigrateController'
    ],
    'components'          => [
        'log' => [
            'traceLevel' => getenv('YII_TRACE_LEVEL'),
            'targets'    => [
                [
                    'class'   => 'yii\log\FileTarget',
                    'prefix'  => function () {
                        return '[console]';
                    },
                    'levels'  => YII_DEBUG ? ['error', 'warning', 'info'] : ['error', 'warning'],
                    'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION'],
                    'logFile' => '@app/runtime/logs/console.log',
                    'dirMode' => 0777
                ],
            ],
        ],
    ]
];


$allowedIPs = ['127.0.0.1', '::1', '192.168.59.*', '172.17.0.*'];

if (php_sapi_name() == 'cli') {
    // Console application
    $config = \yii\helpers\ArrayHelper::merge($config, $console);
} else {
    // Web application
    if (YII_ENV_DEV) {
        // configuration adjustments for web 'dev' environment
        $config['bootstrap'][]      = 'debug';
        $config['modules']['debug'] = [
            'class'      => 'yii\debug\Module',
            'allowedIPs' => $allowedIPs
        ];
    }
    $config = \yii\helpers\ArrayHelper::merge($config, $web);
}

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => $allowedIPs
    ];
}

if (file_exists(__DIR__ . '/local.php')) {
    // Local configuration, if available
    $local  = require(__DIR__ . '/local.php');
    $config = \yii\helpers\ArrayHelper::merge($config, $local);
}

return $config;
