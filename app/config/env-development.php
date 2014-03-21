<?php

// merge this file in main-local.php on your development system
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

return array(
    'preload'    => array( #'less', // LESS compiler, only preload on dev systems, config see below
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
    ),
    'import'     => array(),
    // application components
    'components' => array(
        'messages' => array(
            'class'                => 'CDbMessageSource',
            'onMissingTranslation' => array('TranslationConverter', 'findInPhpMessageSource'), // Notice: degrades performance only enable on development systems
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
                    'class'     => 'vendor.malyshev.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('127.0.0.1'),
                    'enabled'   => true,
                ),
                // file logging
                array(
                    'class'   => 'CFileLogRoute',
                    'levels'  => 'error, warning, info',
                    'enabled' => true,
                ),
                array(
                    'class'   => 'CWebLogRoute',
                    'levels'  => 'error, warning, profile, info, trace',
                    #'categories' => 'application',
                    'enabled' => false,
                ),
                array(
                    'class'   => 'CProfileLogRoute',
                    'report'  => 'callstack',
                    'enabled' => false
                ),
            ),
        ),
    ),
);
?>