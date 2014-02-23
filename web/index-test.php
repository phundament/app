<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1', '192.168.33.101'])) {
    die('You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

// add composer autoloader
require(__DIR__ . '/../vendor/autoload.php');

// prefer yii2-dev if it exists
if (is_file(__DIR__ . '/../vendor/yiisoft/yii2-dev/framework/Yii.php')) {
    require(__DIR__ . '/../vendor/yiisoft/yii2-dev/framework/Yii.php');
} else {
    require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
}

$config = require(__DIR__ . '/../tests/acceptance/_config.php');

(new yii\web\Application($config))->run();
