<?php

require(__DIR__ . '/../vendor/autoload.php');

require(__DIR__ . '/../config/env.php');
defined('YII_DEBUG') or define('YII_DEBUG', (boolean)getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = require(__DIR__ . '/../config/main.php');
$application = new yii\web\Application($config);
$application->run();
