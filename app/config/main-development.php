<?php

// merge this file in main-local.php on your development system

return array(
    'preload'    => array(
        #'less', // LESS compiler, only preload on dev systems, config see below
    ),
    'modules'    => array(
        // code generator
        'gii' => array(
            'class'          => 'system.gii.GiiModule',
            'password'       => 'p3',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'      => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'vendor.phundament.gii-template-collection', // giix generators
                'bootstrap.gii', // bootstrap generator
            ),
        ),
        #'sakila' => array(
        #    'class' => 'vendor.schmunk42.yii-sakila-crud.SakilaModule'
        #)
    ),
    'import'     => array(
        #'vendor.schmunk42.yii-sakila-crud.models.*',
    ),
    // application components
    'components' => array(
        'dbTest'   => array(
            // MySQL
            'class'            => 'CDbConnection',
            'tablePrefix'      => '',
            'connectionString' => 'sqlite:' . $applicationDirectory . '/data/test.db',
        ),
        'dbSakila' => array(
            'class'              => 'CDbConnection',
            // MySQL
            'connectionString'   => 'mysql:host=localhost;dbname=sakila',
            'emulatePrepare'     => true,
            'username'           => 'test',
            'password'           => 'test',
            'charset'            => 'utf8',
            'enableParamLogging' => true
        ),
        'less'     => array(
            'class'        => 'vendor.crisu83.yii-less.components.LessServerCompiler',
            'files'        => array(
                // publish output css file via assets
                '../app/themes/frontend/less/p3.less'      => '../app/themes/frontend/assets/p3.css',
                '../app/themes/frontend/less/backend.less' => '../app/themes/frontend/assets/backend.css',
                '../app/themes/backend2/less/backend.less' => '../app/themes/backend2/css/backend.css',
            ),
            'nodePath'     => '/opt/local/bin/node',
            'compilerPath' => $applicationDirectory . '/../vendor/cloudhead/less.js/bin/lessc',
        ),
        'log'      => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                // Yii debug toolbar
                array(
                    'class'     => 'vendor.malyshev.yii-debug-toolbar.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('127.0.0.1'),
                    'enabled'   => true,
                ),
                // file logging
                array(
                    'class' => 'CFileLogRoute',
                    #'levels' => 'error, warning',
                    #'categories' => 'application',
                ),
            ),
        ),
    ),
);
?>