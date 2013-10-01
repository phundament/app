<?php

/**
 * Phundament 3 Console Config File
 * Containes predefined yiic console commands for Phundament.
 * Define composer hooks by the following name schema: <vendor>/<packageName>-<action>

 */

// for testing purposes
$webappCommand = array(
    'yiic',
    'webapp',
    'create',
    realpath(dirname(__FILE__) . '/../../'),
    'git',
    '--interactive=' . (getenv('PHUNDAMENT_TEST') ? '0' : '1')
);

$applicationDirectory = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

return array(
    'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'       => 'Phundament Console Application',
    'aliases' => array(
        'vendor' => $applicationDirectory . '/../vendor',
    ),
    'commandMap' => array(
        // dev command
        'database'      => array(
            'class' => 'vendor.schmunk42.database-command.EDatabaseCommand',
        ),
        // composer callback
        'migrate'       => array(
            // alias of the path where you extracted the zip file
            'class'                 => 'vendor.yiiext.migrate-command.EMigrateCommand',
            // this is the path where you want your core application migrations to be created
            'migrationPath'         => 'application.migrations',
            // the name of the table created in your database to save versioning information
            'migrationTable'        => 'migration',
            // the application migrations are in a pseudo-module called "core" by default
            'applicationModuleName' => 'core',
            // define all available modules (if you do not set this, modules will be set from yii app config)
            'modulePaths'           => array(
                'rights'                => 'application.migrations.rights',
                'user'                  => 'vendor.mishamx.yii-user.migrations',
                'p3pages'               => 'vendor.phundament.p3pages.migrations',
                'p3widgets'             => 'vendor.phundament.p3widgets.migrations',
                'p3media'               => 'vendor.phundament.p3media.migrations',
                'ckeditor-configurator' => 'vendor.schmunk42.ckeditor-configurator.migrations',
                'translate'             => 'vendor.gusnips.yii-translate.migrations',
                'auditrail2'            => 'vendor.sammaye.auditrail2.migrations',
            ),
            // you can customize the modules migrations subdirectory which is used when you are using yii module config
            'migrationSubPath'      => 'migrations',
            // here you can configure which modules should be active, you can disable a module by adding its name to this array
            'disabledModules'       => array(),
            // the name of the application component that should be used to connect to the database
            'connectionID'          => 'db',
            // alias of the template file used to create new migrations
            #'templateFile' => 'system.cli.migration_template',
        ),
        // composer callback
        'p3bootstrap'   => array(
            'class'           => 'vendor.phundament.p3bootstrap.commands.P3BootstrapCommand',
            'themePath'       => 'application.themes',
        ),
        // composer callback
        'p3echo'        => array(
            'class' => 'application.commands.P3EchoCommand',
        ),
        // composer callback
        'p3media'       => array(
            'class' => 'vendor.phundament.p3media.commands.P3MediaCommand',
        ),
        // composer callback
        'less-setup'    => array(
            'class' => 'vendor.crisu83.yii-less.commands.LessSetupCommand',
        ),
        // media file sync
        'rsync'         => array(
            'class'   => 'vendor.phundament.p3extensions.commands.P3RsyncCommand',
            'servers' => array(
                'local'      => realpath(dirname(__FILE__) . '/..'),
                'production' => 'user@example.com:/path/to/phundament/app',
            ),
            'aliases' => array(
                'p3media' => 'application.data.p3media' # Note: This setting syncs P3Media Files
            ),
            #'params' => '--rsh="ssh -p222"',
        ),
        // composer callback
        'webapp'        => array(
            'class' => 'application.commands.P3WebAppCommand',
        ),
        // composer callback
        'backend-theme' => array(
            'class'     => 'vendor.phundament.backend-theme.commands.PhBackendThemeCommand',
            'themePath' => 'application.themes',
            'themeName' => 'backend2',
        ),
    ),
    'params'     => array(
        'composer.callbacks' => array(
            // command and args for Yii command runner
            'yiisoft/yii-install'              => $webappCommand,
            'phundament/p3bootstrap-install'   => array('yiic', 'p3bootstrap'),
            'phundament/backend-theme-install' => array('yiic', 'backend-theme'),
            'phundament/p3media-install'       => array('yiic', 'p3media'),
            'crisu83/yii-less-install'         => array('yiic', 'less-setup'),
            'post-install'                     => array(
                'yiic',
                'p3echo',
                "To complete the installation process, please run\n\n    app/yiic migrate\n\nfrom your project directory."
            ),
            'post-update'                      => array(
                'yiic',
                'p3echo',
                "To complete the update process, please run:\n\n    app/yiic migrate\n\nfrom your project directory."
            ),
            #'post-install'                     => array(
            #                                          array('yiic', 'migrate', '--interactive=1'),
            #                                          array('yiic', 'foo', '--bar=1'),
            #                                      ),
            #'post-update'                      => array('yiic', 'migrate', '--interactive=1'),
        ),
    )
);
