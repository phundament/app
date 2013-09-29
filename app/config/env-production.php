<?php

// merge this file in local.php on your production system
define('YII_DEBUG', false);

return array(
    // application components
    'components' => array(
        'log' => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error,warning',
                ),
            ),
        ),
    ),
    'params'     => array(
        #'adminEmail' => 'webmaster@h17n.de', // this is used in contact page
    ),
);