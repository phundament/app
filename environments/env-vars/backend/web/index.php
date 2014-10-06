<?php

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/neam/php-app-config/include.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

if (YII_ENV != 'test') {

    $config = yii\helpers\ArrayHelper::merge(
        require(__DIR__ . '/../../common/config/main.php'),
        require(__DIR__ . '/../../common/config/main-local.php'),
        require(__DIR__ . '/../config/main.php'),
        require(__DIR__ . '/../config/main-local.php')
    );

} else {

    $config = require(__DIR__ . '/../../tests/codeception/config/backend/acceptance.php');

}

$application = new yii\web\Application($config);
$application->run();
