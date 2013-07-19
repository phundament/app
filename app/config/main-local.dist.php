<?php

// Use this file as local.php to override settings only on your local machine
//
// DO NOT COMMIT THIS FILE !!!

// include 'development' or 'production'
$environmentConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main-development.php';


$localConfig = array(
    'params' => array(
        'foo' => 'bar'
    )
);

// merge configs in the following order (most to least important) local, {env}, main
if (is_file($environmentConfigFile)) {
    return CMap::mergeArray(require($environmentConfigFile), $localConfig);
} else {
    return $localConfig;
}