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
 * Helper command for the application
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
            'Database DSN'
        );
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
            'params.appName',
            'Application name'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.adminEmail',
            'Webmaster e-mail address'
        );
        $this->promptUpdateConfigurationValue(
            'common/config/params.php',
            'params.supportEmail',
            'Support e-mail address'
        );

        if ($this->confirm("Setup test-database")) {

            $this->promptUpdateConfigurationValue(
                'common/config/main-local.php',
                'components.db_test.dsn',
                'Test-Database DSN'
            );
            $this->promptUpdateConfigurationValue(
                'common/config/main-local.php',
                'components.db_test.username',
                'Test-Database user:'
            );
            $this->promptUpdateConfigurationValue(
                'common/config/main-local.php',
                'components.db_test.password',
                'Test-Database password:'
            );

        }
    }

    /**
     * Install packages for application testing
     */
    public function actionSetupTests()
    {
        $this->action('migrate', ['db' => 'db_test', 'interactive' => $this->interactive]);

        $this->composer(
            'global require "codeception/codeception:2.0.*" "codeception/specify:*" "codeception/verify:*"'
        );
        $this->composer(
            'require --dev "yiisoft/yii2-coding-standards:*" "yiisoft/yii2-codeception:*" "yiisoft/yii2-faker:*"'
        );

        $this->execute('codecept build -c tests/codeception/backend');
        $this->execute('codecept build -c tests/codeception/frontend');
        $this->execute('codecept build -c tests/codeception/common');
        $this->execute('codecept build -c tests/codeception/console');
    }

    /**
     * Run all test suites with web-server from PHP executable
     */
    public function actionRunTests()
    {
        echo "Note! You can tear down the test-server with `killall php`\n";
        if ($this->confirm("Start testing?", true)) {
            $this->execute('php -S localhost:8042 > /dev/null 2>&1 &');
            $this->execute('codecept run -c tests/codeception/backend');
            $this->execute('codecept run -c tests/codeception/frontend');
            $this->execute('codecept run -c tests/codeception/common');
            $this->execute('codecept run -c tests/codeception/console');
        }
    }

    /**
     * Install packages for documentation rendering
     */
    public function actionSetupDocs()
    {
        // TODO: remove dev packages
        $this->composer(
            'require --dev "cebe/markdown:dev-master as 0.9.3" "cebe/markdown-latex:dev-master" "yiisoft/yii2-apidoc:*"'
        );
    }

    /**
     * Generate application and required vendor documentation
     */
    public function actionGenerateDocs()
    {
        $this->execute('vendor/bin/apidoc guide docs docs-html');
        $this->execute('vendor/bin/apidoc api backend,common,console,frontend,vendor/schmunk42,vendor/dmstr docs-html');
    }

    /**
     * Setup admin user (create, update password, confirm)
     */
    public function actionAdminUser()
    {
        $email    = $this->prompt('E-Mail for application admin user:', ['required' => true]);
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
        echo "\n";
        $frontendName = $this->prompt('"Frontend" Domain-name (example: myproject.com.local, leave empty to skip)');
        if ($frontendName) {
            $this->execute('virtualhost.sh ' . $frontendName . ' ' . \Yii::getAlias('@frontend') . DIRECTORY_SEPARATOR . "web");
            echo "\n";
            $backendName = $this->prompt('"Backend" Domain-name (example: admin.' . $frontendName . ', leave empty to skip)');
            if ($backendName) {
                $this->execute('virtualhost.sh ' . $backendName . ' ' . \Yii::getAlias('@backend') . DIRECTORY_SEPARATOR . "web");
            }
        }
    }

} 