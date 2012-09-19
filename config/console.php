<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

$mainConfig = require('main.php');
return array(
    'aliases' => array(
      'vendor' => 'application.vendor',
      'webroot' => 'application.www'
    ),
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    'components' => $mainConfig['components'],
    'modules' => $mainConfig['modules'],
    'commandMap' => array(
        'p3webapp' => array(
            'class' => 'vendor.phundament.p3admin.commands.P3WebappCommand',
        ),
        'rsync' => array(
            'class' => 'vendor.p3extensions.commands.P3RsyncCommand',
            'servers' => array(
                'dev' => realpath(dirname(__FILE__) . '/..'),
                'prod' => 'user@exampl.com:/path/to/phundament/protected',
            ),
            'aliases' => array(
                'data' => 'application.data' # Note: This setting syncs SQLite Database(!) and P3Media Files
            ),
        #'params' => '--rsh="ssh -p222"',
        ),
        'dumpschema' => array(
            'class' => 'ext.p3extensions.commands.P3DumpSchemaCommand',
        ),
        'migrate' => array(
            // alias of the path where you extracted the zip file
            'class' => 'vendor.yiiext.migrate-command.EMigrateCommand',
            // this is the path where you want your core application migrations to be created
            'migrationPath' => 'application.migrations',
            // the name of the table created in your database to save versioning information
            'migrationTable' => 'migration',
            // the application migrations are in a pseudo-module called "core" by default
            'applicationModuleName' => 'core',
            // define all available modules (if you do not set this, modules will be set from yii app config)
            'modulePaths' => array(
                #'admin'      => 'application.modules.admin.db.migrations',
                'user' => 'vendor.phundament.p3admin.modules-install.user.migrations',
                'rights' => 'vendor.phundament.p3admin.modules-install.rights.migrations',
                'p3pages' => 'vendor.phundament.p3pages.migrations',
                'p3widgets' => 'vendor.phundament.p3widgets.migrations',
                'p3media' => 'vendor.phundament.p3media.migrations',
            #'yourModule' => 'application.any.other.path.possible',
            // ...
            ),
            // you can customize the modules migrations subdirectory which is used when you are using yii module config
            'migrationSubPath' => 'migrations',
            // here you can configure which modules should be active, you can disable a module by adding its name to this array
            'disabledModules' => array(
            #'admin', 'anOtherModule', // ...
            ),
            // the name of the application component that should be used to connect to the database
            'connectionID' => 'db',
            // alias of the template file used to create new migrations
            'templateFile' => 'application.db.migration_template',
        ),
        // composer commands
        'p3bootstrap-composer' => array(
            'class' => 'vendor.phundament.themes.p3bootstrap.commands.ComposerPackageCommand',
        ),
        'p3media-composer' => array(
            'class' => 'vendor.phundament.p3media.commands.ComposerPackageCommand',
        ),
    ),
);