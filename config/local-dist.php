<?php

// Use thie file as local.php to override settings only on your local machine
//
// DO NOT COMMIT THIS FILE !!!

return array(
    #'theme' => 'classic',
    'import' => array( #'fullcrud.models.*',
        #'sakila.components.*',
        #'sakila.models.*',
    ),
    // application components
    'components' => array(
        'assetManager' => array(
            'linkAssets' => true
        ),
        /* 'db' => array(
          // MySQL
          'connectionString' => 'mysql:host=localhost;dbname=p3',
          'emulatePrepare' => true,
          'username' => 'test',
          'password' => 'test',
          'charset' => 'utf8',
          'enableParamLogging' => true
          ), */
        /* 'db2' => array(
          // MySQL
          'connectionString' => 'mysql:host=localhost;dbname=db2',
          'emulatePrepare' => true,
          'username' => 'test',
          'password' => 'test',
          'charset' => 'utf8',
          ), */
        'less' => array(
            'class' => 'vendor.crisu83.yii-less.components.Less',
            'mode' => 'server',
            'files' => array(
                'themes/frontend/less/p3.less' => 'themes/frontend/css/p3.css',
            ),
            'options' => array(
                //'forceCompile' => true,
                'nodePath' => '/opt/local/bin/node',
                'compilerPath' => $applicationDirectory . '/vendor/cloudhead/less.js/bin/lessc',
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    #'categories' => 'application',
                    'levels' => '',
                ),
                // uncomment the following to show log messages on web pages
                /*
                  array(
                  'class'=>'CWebLogRoute',
                  ),
                 */
            ),
        ),
        /*'urlManager' => array(
            'urlFormat' => 'path', // you'll need to use the supplied _.htaccess file
        ),
         'image' => array(
          'class' => 'ext.phundament.p3extensions.components.image.CImageComponent',
          // GD or ImageMagick
          'driver' => 'ImageMagick',
          'params' => array('directory' => '/opt/local/bin'),
          ), */
    ),
    'modules' => array( #'fullcrud',
        #'sakila',
        #'fullcrudWorld',
    ),
    'params' => array( // this is used in contact page
        #'adminEmail' => 'webmaster@h17n.de',
    ),
);
?>