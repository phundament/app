<?php

/**
 * Phundament 3 Console Config File
 *
 * Containes predefined yiic console commands for Phundament.
 *
 * Define composer hooks by the following name schema: <vendor>/<packageName>-<action>
 *
 */
$mainConfig = require('main.php');
return array(
    'aliases' => array(
        'vendor' => 'application.vendor',
    ),
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    'components' => $mainConfig['components'],
    'modules' => $mainConfig['modules'],
    'commandMap' => array(
        'rsync' => array(
            'class' => 'vendor.phundament.p3extensions.commands.P3RsyncCommand',
            'servers' => array(
                'dev' => realpath(dirname(__FILE__) . '/..'),
                'prod' => 'user@exampl.com:/path/to/phundament/protected',
            ),
            'aliases' => array(
                'data' => 'application.data' # Note: This setting syncs SQLite Database(!) and P3Media Files
            ),
        #'params' => '--rsh="ssh -p222"',
        ),
        'database' => array(
            'class' => 'vendor.schmunk42.database-command.EDatabaseCommand',
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
                'user' => 'vendor.phundament.p3admin.modules-install.user.migrations',
                'rights' => 'vendor.phundament.p3admin.modules-install.rights.migrations',
                'p3pages' => 'vendor.phundament.p3pages.migrations',
                'p3widgets' => 'vendor.phundament.p3widgets.migrations',
                'p3media' => 'vendor.phundament.p3media.migrations',
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
#'templateFile' => 'system.cli.migration_template',
        ),
        // composer "hooks", will be executed after package install or update
        'p3webapp' => array(
            'class' => 'vendor.phundament.p3admin.commands.P3WebAppCommand',
        ),
        'p3bootstrap' => array(
            'class' => 'vendor.phundament.themes.p3bootstrap.commands.P3BootstrapCommand',
        ),
        'p3media' => array(
            'class' => 'vendor.phundament.p3media.commands.P3MediaCommand',
        ),
    ),
    'params' => array(
        'composer.callbacks' => array(
            // args for Yii command runner
            'post-update' => array('yiic', 'migrate'),
            'post-install' => array('yiic', 'migrate'),
            'phundament/p3admin-install' => array('yiic', 'p3webapp', 'create', realpath(dirname(__FILE__) . '/..'), 'git', '--interactive=0'),
            'phundament/themes/p3bootstrap-install' => array('yiic', 'p3bootstrap'),
            'phundament/p3media-install' => array('yiic', 'p3media'),
        ),
    )
);