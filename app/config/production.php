<?php

// merge this file in local.php on your production system

return array(
    // application components
    'components' => array(
/*        'db' => array(
          'class' => 'CDbConnection',
          // MySQL
          'connectionString' => 'mysql:host=localhost;dbname=p3',
          'emulatePrepare' => true,
          'username' => 'test',
          'password' => 'test',
          'charset' => 'utf8',
          'enableParamLogging' => true
          ),
  */      'log'          => array(
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
    'params'     => array( // this is used in contact page
        #'adminEmail' => 'webmaster@h17n.de',
    ),
);
?>