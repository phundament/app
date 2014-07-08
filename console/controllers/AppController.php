<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace console\controllers;

use dmstr\console\controllers\BaseAppController;


/**
 * Manages application update and configuration.
 * @package console\controllers
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class AppController extends BaseAppController
{
    /**
     * Display help command
     */
    public function actionIndex()
    {
        // TODO:
        echo "Use ./yii help app to show help.\n";
    }

    /**
     * Basic application setup
     */
    public function actionInit()
    {
        // TODO: get Phundament version from `git describe` and store it in $app->params
        $this->action('app/configure');
        $this->action('migrate');
    }

    /**
     * Update application and vendor source code, run database migrations, clear cache
     */
    public function actionUpdate()
    {
        $this->execute("git pull");
        $this->composer("install");
        $this->action('migrate');
        $this->action('cache/flush');
    }

    /**
     * Manage application extensions
     */
    public function actionConfigure()
    {
        echo "\nPhundament Application Configuration\n";
        echo "------------------------------------\n";

        $this->promptUpdateConfigurationValue(
            'common/config/main-local.php',
            'components.db.dsn',
            'Database DSN (use eg. mysql:host=localhost;dbname=myapp)'
        );
        $dsn = $this->readConfigurationValue(
            'common/config/main-local.php',
            'components.db.dsn'
        );
        if (substr($dsn, 0, 7) == 'sqlite:') {
            $isSqlite = true;
            $file     = substr($dsn, 7);
            if (!is_file($file)) {
                touch($file);
                echo "SQLite database file '($file)' created.\n";
            }
        } else {
            $isSqlite = false;
        }

        $this->promptUpdateConfigurationValue(
            'common/config/main-local.php',
            'components.db.username',
            'Database user'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/main-local.php',
            'components.db.password',
            'Database password'
        );

        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.adminEmail',
            'Admin e-mail address (frontend and backend)'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.supportEmail',
            'Support e-mail address'
        );

        if (!$isSqlite) {
            if ($this->confirm("Enable user module extension (dektrium/yii2-user)?", true)) {
                $userModuleid = $this->prompt("User module ID", ['default' => 'user']);
                $this->composer("require dektrium/yii2-user '*'");
                $this->addToConfigurationArray(
                    'common/config/main.php',
                    'modules',
                    ['user' => ['class' => 'dektrium\\user\\Module']]
                );
                $this->addToConfigurationArray(
                    'console/config/params.php',
                    'params/yii.migrations',
                    ['@dektrium/user/migrations']
                );
            }
        } else {
            echo "User module installation skipped, due to SQLite database, use MySQL or PostgreSQL.\n";
        }

        if ($this->confirm("Enable Testing & QA (installation of build and test tools via composer)")) {
            $this->composer(
                'require --dev "yiisoft/yii2-apidoc: *" "yiisoft/yii2-coding-standards: *" "yiisoft/yii2-codeception: *" "codeception/codeception: 2.0.*" "codeception/specify: *" "codeception/verify: *" "yiisoft/yii2-faker: *"'
            );

            $this->addToConfigurationArray(
                'console/config/main.php',
                'controllerMap',
                ["docs-api" => "yii\\apidoc\\commands\\ApiController"]
            );
            $this->addToConfigurationArray(
                'console/config/main.php',
                'controllerMap',
                ["docs-guide" => "yii\\apidoc\\commands\\GuideController"]
            );

            $this->execute('vendor/bin/codecept build -c backend');
            $this->execute('vendor/bin/codecept build -c frontend');
            $this->execute('vendor/bin/codecept build -c common');
            $this->execute('vendor/bin/codecept build -c console');
        }
    }

    /**
     * Generate application and required vendor documentation
     */
    public function actionDocs()
    {
        $this->action('docs-api', ['frontend,backend,console,common,vendor/dmstr', 'docs-html', 'interactive' => 0]);
        $this->action('docs-guide', ['docs', 'docs-html', 'interactive' => 0]);
    }

    /**
     * Source code checks and tests
     */
    public function actionQa()
    {
        $this->composer('validate');
        $this->execute(
            'vendor/bin/phpcs --extensions=php --standard=vendor/yiisoft/yii2-coding-standards/Yii2 --ignore=web,views,tests backend/ frontend/'
        );
        $this->execute('vendor/bin/codecept run --config backend unit');
        $this->execute('vendor/bin/codecept run --config frontend unit');
        $this->execute('vendor/bin/codecept run --config common unit');
        $this->execute('vendor/bin/codecept run --config console unit');
    }
} 