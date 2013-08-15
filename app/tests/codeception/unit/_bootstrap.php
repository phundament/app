<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../../vendor/yiisoft/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../../../../app/config/test.php';

require_once($yiit);
//require_once(dirname(__FILE__).'/WebTestCase.php');

// require composer autoloader
require_once(dirname(__FILE__).'/../../../../vendor/autoload.php');

if (!Yii::app()) Yii::createWebApplication($config);
