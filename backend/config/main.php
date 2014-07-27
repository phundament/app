<?php
$params = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend', #value:id#
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        #array:modules>begin#
        #array:modules>end#
    ],
    'components' => [
        #array:components>begin#
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                #array:components.log.targets>begin#
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                #array:components.log.targets>end#
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        #array:components>end#
    ],
    'params' => $params,
];
