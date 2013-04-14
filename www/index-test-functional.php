<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$yii    = dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php';
$config = dirname(__FILE__) . '/../app/config/test-functional.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once($yii);

return array(
    'class'  => 'CWebApplication',
    'config' => $config
);
