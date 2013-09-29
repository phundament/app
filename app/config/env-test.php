<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

return array(
    'components' => array(
        'assetManager' => array(
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . "../../www/assets",
            // needed when running from global codecept.phar installation
        ),
        'fixture'      => array(
            'class' => 'system.test.CDbFixtureManager',
        ),
    ),
);
