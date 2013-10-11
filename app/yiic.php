<?php

// config files
$dir     = realpath(dirname(__FILE__) . '/..') . '/';
$console = require($dir . 'app/config/console.php');
$main    = require($dir . 'app/config/main.php');
$local   = array();
$env     = array();

// include local & env
$localFileName = $dir . 'app/config/main-local.php';
if (is_file($localFileName)) {
    $local       = require($localFileName);
    $envFileName = $dir . 'app/config/env-' . $local['params']['env'] . '.php';
    if (is_file($envFileName)) {
        $env = require($envFileName);
    }
}

// register composer autoloader
require_once(dirname(__FILE__) . '/../vendor/autoload.php');

// load Yii
require_once($dir . 'vendor/yiisoft/yii/framework/yii.php');

$webConfig = CMap::mergeArray($main, $env, $local);

// create base console config from web configuration
$config = array(
    'name'       => $webConfig['name'],
    'language'   => $webConfig['language'],
    'basePath'   => $webConfig['basePath'],
    'aliases'    => $webConfig['aliases'],
    'import'     => $webConfig['import'],
    'components' => $webConfig['components'],
    'modules'    => $webConfig['modules'],
    'params'     => $webConfig['params'],
);

// apply console config
$config = CMap::mergeArray($config, $console);

// Check for optional local console-local.php configuration file
if (file_exists($dir . 'app/config/console-local.php')) {
    $consoleLocal = require($dir . 'app/config/console-local.php');
    $config       = CMap::mergeArray($config, $consoleLocal);
}

// This will use $config and autostart a console application
require_once($dir . 'vendor/yiisoft/yii/framework/yiic.php');
