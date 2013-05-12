<?php

// Use this file as local.php to override settings only on your local machine
//
// DO NOT COMMIT THIS FILE !!!

// include 'development' or 'production'
$environmentConfigFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'development.php';


$localConfig = array(
    'params' => array(
        'foo' => 'bar'
    )
);


if (is_file($environmentConfigFile)) {
    return CMap::mergeArray(require($environmentConfigFile), $localConfig);
}
else {
    return $localConfig;
}
?>

?>