<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db     = require(__DIR__ . '/db.php');
$web    = require(__DIR__ . '/web.php');

return [
    'id'                  => 'basic-console',
    'basePath'            => dirname(__DIR__),
    'preload'             => ['log'],
    'controllerNamespace' => 'app\commands',
    'extensions'          => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'aliases'             => $web['aliases'],
    'controllerMap'       => [
        'sakila-batch' => 'schmunk42\\sakila\\commands\\GiibatchController'
    ],
    'components'          => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log'   => [
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                ],
            ],
        ],
        'db'    => $db,
    ],
    'modules'             => [
        'console-gii' => $web['modules']['gii'],
        'console-sakila'      => $web['modules']['sakila'],
    ],
    'params'              => $params,
];
