<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace console\controllers;

use yii\console\Controller;


/**
 * Manages application update and configuration.
 * @package console\controllers
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class PhundamentController extends Controller
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    /**
     * Show help
     */
    public function actionIndex(){
        $this->action('help phundament');
    }

    /**
     * Basic application setup
     */
    public function actionInit(){
        $this->action('phundament/configure');
        $this->action('migrate');
    }

    /**
     * Update application and vendor source code, run database migrations, clear cache
     */
    public function actionUpdate()
    {
        $this->execute("git pull");
        $this->execute("composer.phar install");
        $this->action('migrate');
        $this->action('cache/flush');
    }

    /**
     * Manage application extensions
     */
    public function actionConfigure()
    {
        /*
        if ($this->confirm("Enable user module extension (dektrium/yii2-user)?")) {
            $id = $this->prompt("User module ID?", ['default'=>'user']);
            $this->execute("composer.phar require dektrium/yii2-user '*'");
            $this->addModule($configFile, $id, $params);
        }
        */

        if ($this->confirm("Enable Testing & QA (installation of build and test tools via composer)")) {
            echo "Updating composer dependencies, this may take some time...";
            $this->execute('composer.phar require --dev "yiisoft/yii2-apidoc: *" "yiisoft/yii2-coding-standards: *" "yiisoft/yii2-codeception: *" "codeception/codeception: 2.0.*" "codeception/specify: *" "codeception/verify: *" "yiisoft/yii2-faker: *"');
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
        $this->execute('composer.phar validate');
        $this->execute('vendor/bin/phpcs --extensions=php --standard=vendor/yiisoft/yii2-coding-standards/Yii2 --ignore=web,views,tests backend/ frontend/');
        $this->execute('vendor/bin/codecept run --config backend unit');
        $this->execute('vendor/bin/codecept run --config frontend unit');
        $this->execute('vendor/bin/codecept run --config common unit');
        $this->execute('vendor/bin/codecept run --config console unit');
    }

    /*public function actionAnalyze()
    {
        #$this->execute("linkcheck");
        #$this->execute("imagecheck");
        #$this->execute("webmaster-tools");
    }*/

    private function execute($command)
    {
        echo "\n\nExecuting '$command'...\n";
        exec($command, $output, $return);
        foreach ($output as $line) {
            echo $line . "\n";
        }
    }

    private function action($command, $params = [])
    {
        echo "\n\nRunning action '$command'...\n";
        \Yii::$app->runAction($command, $params);
    }

    private function addModule($name, $package, $version)
    {
       echo "TBD";
    }
}