<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

$mainConfig = require('p3.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'components'=> $mainConfig['components'],
	'modules' => $mainConfig['modules']
);