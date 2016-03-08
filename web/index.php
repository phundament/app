<?php
$rootPath = __DIR__.'/..';

require($rootPath.'/vendor/autoload.php');
require($rootPath.'/src/config/env.php');

defined('YII_DEBUG') or define('YII_DEBUG', (boolean)getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));

require($rootPath.'/vendor/yiisoft/yii2/Yii.php');

$config = require($rootPath.'/src/config/main.php');
$application = new yii\web\Application($config);
$application->run();
