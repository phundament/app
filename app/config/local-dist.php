<?php

// Use thie file as local.php to override settings only on your local machine
//
// DO NOT COMMIT THIS FILE !!!

return array(
    'import'     => array( /*'sakila.components.*',
        'sakila.models.*',*/
    ),
    // application components
    'components' => array(
        /*'assetManager' => array(
            'linkAssets' => true
        ),*/
        /* 'db' => array(
          // MySQL
          'class' => 'CDbConnection',
          'connectionString' => 'mysql:host=localhost;dbname=p3',
          'emulatePrepare' => true,
          'username' => 'test',
          'password' => 'test',
          'charset' => 'utf8',
          'enableParamLogging' => true
          ), */
        'dbTest' => array(
            // MySQL
            'class'            => 'CDbConnection',
            'tablePrefix'      => '',
            'connectionString' => 'sqlite:' . $applicationDirectory . '/data/test.db',
        ),
        'less'         => array(
            'class'   => 'vendor.crisu83.yii-less.components.Less',
            'mode'    => 'server',
            'files'   => array(
                // register files here or in your in the layout
                'themes/frontend/less/p3.less' => 'themes/frontend/css/p3.css',
                'themes/backend/less/p3.less' => 'themes/backend/css/p3.css',
            ),
            'options' => array(
                //'forceCompile' => true,
                'nodePath'     => '/opt/local/bin/node',
                'compilerPath' => $applicationDirectory . '/../vendor/cloudhead/less.js/bin/lessc',
            ),
        ),
        'log'    => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'     => 'vendor.malyshev.yii-debug-toolbar.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('127.0.0.1'),
                ),
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    #'categories' => 'application',
                ),
            ),
        ),
        /*'image' => array(
            'class' => 'ext.phundament.p3extensions.components.image.CImageComponent',
            'driver' => 'ImageMagick', // GD or ImageMagick
            'params' => array('directory' => '/opt/local/bin'),
         ),*/
    ),
    'modules'    => array( /*'sakila',*/
    ),
    'params'     => array( // this is used in contact page
        /*'adminEmail' => 'webmaster@h17n.de',*/
    ),
);
?>