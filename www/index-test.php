<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$yii    = dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php';
$config = dirname(__FILE__) . '/../app/config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

// register composer autoloader
require_once(dirname(__FILE__).'/../vendor/autoload.php');

require_once($yii);

Yii::createWebApplication($config)->run();


