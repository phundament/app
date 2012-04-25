<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

$mainConfig = require('main.p3.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'components'=> $mainConfig['components'],
	'modules' => $mainConfig['modules'],
	'commandMap' => array(
        'rsync'=>array(
            'class' => 'ext.p3extensions.commands.P3RsyncCommand',
            'servers' => array(
                'dev' => realpath(dirname(__FILE__).'/..'),
                'prod' => 'user@exampl.com:/path/to/phundament/protected',
            ),
            'aliases' => array(
                'data' => 'application.data' # Note: This setting syncs SQLite Database(!) and P3Media Files    
            ),
			#'params' => '--rsh="ssh -p222"',
        ),
        'dumpschema'=>array(
            'class' => 'ext.p3extensions.commands.P3DumpSchemaCommand',
		),
    ),
);