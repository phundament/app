<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../vendor/yiisoft/yii/framework/yiit.php';
$main=require(dirname(__FILE__).'/../../../app/config/main.php');
$env=require(dirname(__FILE__).'/../../../app/config/env-test.php');

require_once($yiit);
//require_once(dirname(__FILE__).'/WebTestCase.php');

// require composer autoloader
require_once(dirname(__FILE__).'/../../../vendor/autoload.php');

$config = CMap::mergeArray($main, $env);
$config['components']['db'] = $config['components']['dbTest'];

if (!Yii::app()) Yii::createWebApplication($config);
