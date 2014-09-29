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
     * Displays application version from git describe
     */
    public function actionIndex()
    {
        echo "Application Version\n";
        $this->execute('git describe');
        echo "\n";
    }

    /**
     * Manage application configuration
     */
    public function actionConfigure()
    {
        echo "\nPhundament Application Configuration\n";
        echo "------------------------------------\n";

        echo "Note: This feature is currently in DEVELOPMENT, make a backup of your data first!\n";

        echo "Note: SQLite is currently not supported.\n";
        $this->promptUpdateConfigurationValue(
            'common/config/main-local.php',
            'components.db.dsn',
            'Database DSN (use eg. mysql:host=localhost;dbname=myapp):'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/main-local.php',
            'components.db.username',
            'Database user:'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/main-local.php',
            'components.db.password',
            'Database password:'
        );

        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.appName',
            'Name of your application (shown in navigation):'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.adminEmail',
            'Admin (webmaster) e-mail address:'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.supportEmail',
            'Support e-mail address:'
        );

        /*if ($this->confirm("Enable Testing & QA (installation of build and test tools via composer)")) {
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
        }*/
    }

    /**
     * Setup admin user (create, update password, confirm)
     */
    public function actionAdminUser()
    {
        $email = $this->prompt('E-Mail for application admin user:', ['required' => true]);
        $password = $this->prompt(
            'Password for application admin user (leave empty if you want to use the auto-generated value):'
        );
        $this->action('user/create', [$email, 'admin']);
        if ($password) {
            $this->action('user/password', ['admin', $password]);
        }
        $this->action('user/confirm', ['admin']);
    }

    /**
     * Setup vhost with virtualhost.sh script
     */
    public function actionVirtualHost()
    {
        $name = $this->prompt('Domain-name for virtualhost.sh (leave empty to skip):');
        if ($name) {
            $this->execute('virtualhost.sh ' . $name);
        }
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
     * Generate application and required vendor documentation
     */
    /*public function actionDocs()
    {
        $this->action('docs-api', ['frontend,backend,console,common,vendor/dmstr', 'docs-html', 'interactive' => 0]);
        $this->action('docs-guide', ['docs', 'docs-html', 'interactive' => 0]);
    }*/

    /**
     * Source code checks and tests
     */
    /*public function actionQa()
    {
        $this->composer('validate');
        $this->execute(
            'vendor/bin/phpcs --extensions=php --standard=vendor/yiisoft/yii2-coding-standards/Yii2 --ignore=web,views,tests backend/ frontend/'
        );
        $this->execute('vendor/bin/codecept run --config backend unit');
        $this->execute('vendor/bin/codecept run --config frontend unit');
        $this->execute('vendor/bin/codecept run --config common unit');
        $this->execute('vendor/bin/codecept run --config console unit');
    }*/
} 