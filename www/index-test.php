<?php

// config files
$dir = realpath(dirname(__FILE__).'/..').'/';
$main   = require($dir.'app/config/main.php');
$local  = require($dir.'app/config/main-local.php');
$env    = require($dir.'app/config/env-test.php');

// define YII_DEBUG in config files
if (defined('YII_DEBUG') && YII_DEBUG)
    error_reporting(E_ALL | E_STRICT);

// register composer autoloader
require_once(dirname(__FILE__).'/../vendor/autoload.php');

// load Yii
require_once($dir.'vendor/yiisoft/yii/framework/yii.php');

// merge configurations
$config = CMap::mergeArray($main,$env,$local);

// use dbTest as default database
if (empty($config['components']['dbTest'])) {
    throw new CException('Application component `dbTest` must be defined.');
} else {
    $config['components']['db'] = $config['components']['dbTest'];
}

// start web application
Yii::createWebApplication($config)->run();
