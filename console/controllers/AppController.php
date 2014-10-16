<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace console\controllers;

use dektrium\user\ModelManager;
use dmstr\console\controllers\BaseAppController;


/**
 * Helper command for the application
 * @package console\controllers
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class AppController extends BaseAppController
{
    public $defaultAction = 'version';

    /**
     * Displays application version from git describe
     */
    public function actionVersion()
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
     * Initial application setup
     */
    public function actionSetup()
    {
        $this->action('migrate');
        $this->action('app/setup-admin-user');
        $this->action('app/virtual-host');
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
            'require --dev "yiisoft/yii2-coding-standards:2.*" "yiisoft/yii2-codeception:2.*" "yiisoft/yii2-faker:2.*"'
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
        $this->composer(
            'require --dev "cebe/markdown-latex:dev-master" "yiisoft/yii2-apidoc:2.*"'
        );
    }

    /**
     * Setup admin user (create, update password, confirm)
     */
    public function actionSetupAdminUser()
    {
        $mgr   = new ModelManager;
        $admin = $mgr->findUserByUsername('admin');
        if ($admin === null) {
            $email = $this->prompt('E-Mail for application admin user:', ['required' => true]);
            $this->action('user/create', [$email, 'admin']);
            $password = $this->prompt(
                'Password for application admin user (leave empty if you want to use the auto-generated value):'
            );
        } else {
            $password = $this->prompt(
                'Update password for application admin user (leave empty to skip):'
            );
        }
        if ($password) {
            $this->action('user/password', ['admin', $password]);
        }
        $this->action('user/confirm', ['admin']);
    }

    /**
     * Generate application and required vendor documentation
     */
    public function actionGenerateDocs()
    {
        if ($this->confirm('Regenerate documentation files into ./docs-html', true)) {
            $this->execute('vendor/bin/apidoc guide --interactive=0 docs docs-html');
            $this->execute('vendor/bin/apidoc api --interactive=0 --exclude=runtime/,tests/ backend,common,console,frontend docs-html');
            $this->execute('vendor/bin/apidoc guide --interactive=0 docs docs-html');
        }
    }

    /**
     * Setup vhost with virtualhost.sh script
     */
    public function actionVirtualHost()
    {
        if (`which virtualhost.sh`) {
            echo "\n";
            $frontendName = $this->prompt('"Frontend" Domain-name (example: myproject.com.local, leave empty to skip)');
            if ($frontendName) {
                $this->execute(
                    'virtualhost.sh ' . $frontendName . ' ' . \Yii::getAlias('@frontend') . DIRECTORY_SEPARATOR . "web"
                );
                echo "\n";
                $defaultBackendName = 'admin.' . $frontendName;
                $backendName        = $this->prompt(
                    '"Backend" Domain-name',
                    ['default' => $defaultBackendName]
                );
                if ($backendName) {
                    $this->execute(
                        'virtualhost.sh ' . $backendName . ' ' . \Yii::getAlias(
                            '@backend'
                        ) . DIRECTORY_SEPARATOR . "web"
                    );
                }
            }
        } else {
            echo "Command virtualhost.sh not found, skipping.\n";
        }
    }

} 