<?php

// merge this file in local.php on your production system

return array(
    // application components
    'components' => array(
        'log' => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    #'categories' => 'application',
                    'levels' => 'alert,error',
                ),
            ),
        ),
    ),
    'params'     => array(#'adminEmail' => 'webmaster@h17n.de', // this is used in contact page
    ),
);