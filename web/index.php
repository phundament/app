<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

// add composer autoloader
require(__DIR__ . '/../vendor/autoload.php');

// prefer yii2-dev if it exists
if (is_file(__DIR__ . '/../vendor/yiisoft/yii2-dev/framework/Yii.php')) {
    require(__DIR__ . '/../vendor/yiisoft/yii2-dev/framework/Yii.php');
} else {
    require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
}

$config = require(__DIR__ . '/../app/config/web.php');

// use local config file if available
if (is_file(__DIR__ . '/../app/config/web-local.php')) {
    $config = \yii\helpers\ArrayHelper::merge($config,require(__DIR__ . '/../app/config/web-local.php'));
}

(new yii\web\Application($config))->run();
