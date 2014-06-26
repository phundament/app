<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace console\controllers;

use yii\base\Exception;
use yii\console\Controller;


/**
 * Manages application update and configuration.
 * @package console\controllers
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class PhundamentController extends Controller
{
    public $composerExecutables = ['composer.phar', 'composer'];
    private $_composerExecutable = null;

    public function init()
    {
        parent::init();
        foreach ($this->composerExecutables AS $cmd) {
            exec($cmd, $output, $return);
            if ($return == 0) {
                $this->_composerExecutable = $cmd;
                return;
            }
        }
        throw new Exception('Composer executable not found.');
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    /**
     * Show help
     */
    public function actionIndex()
    {
        $this->action('help phundament');
    }

    /**
     * Basic application setup
     */
    public function actionInit()
    {
        $this->action('phundament/configure');
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
            $file = substr($dsn, 7);
            if (!is_file($file)) {
                touch($file);
                echo "SQLite database file '($file)' created.\n";
            }

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

        if ($this->confirm("Enable user module extension (dektrium/yii2-user)?", true)) {
            $userModuleid = $this->prompt("User module ID", ['default' => 'user']);
            $this->composer("require dektrium/yii2-user '*'");
            $this->addToConfigurationArray(
                'common/config/main.php',
                'modules',
                ['user' => ['class' => 'dektrium\\user\\Module']]
            );
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

    private function composer($command)
    {
        $this->execute($this->_composerExecutable . ' ' . $command);
    }

    private function execute($command)
    {
        echo "\n\nExecuting '$command'...\n";
        if (($fp = popen($command, "r"))) {
            while (!feof($fp)) {
                echo fread($fp, 1024);
                flush(); // you have to flush buffer
            }
            fclose($fp);
        }
    }

    private function action($command, $params = [])
    {
        echo "\n\nRunning action '$command'...\n";
        \Yii::$app->runAction($command, $params);
    }

    private function readConfigurationValue($file, $id)
    {
        $marker  = "#value:{$id}";
        $subject = file_get_contents($file);
        $regex   = "/(\s*'[^']*'\s*=>\s*')([^']*)(',\s*" . $marker . ")/";
        preg_match($regex, $subject, $matches);
        return $matches[2];
    }

    private function promptUpdateConfigurationValue($file, $id, $prompt)
    {
        $value = $this->prompt($prompt, ['default' => $this->readConfigurationValue($file, $id)]);
        $this->updateConfigurationValue($file, $id, $value);
    }

    private function updateConfigurationValue($file, $id, $value)
    {
        $marker  = "#value:{$id}";
        $subject = file_get_contents($file);
        $regex   = "/(\s*'[^']*'\s*=>\s*')[^']*(',\s*" . $marker . ")/";
        $content = preg_replace($regex, "$1" . $value . "$2", $subject);
        file_put_contents($file, $content);
    }

    private function addToConfigurationArray($file, $id, $item)
    {
        $marker      = "#array:{$id}>end#";
        $valueString = substr(\yii\helpers\VarDumper::export($item), 2, -2); // use value without enclosing brackets
        $subject     = file_get_contents($file);
        if (!$this->validateConfigurationChange($subject, $marker, $item)) {
            echo "Not updated configuration array '{$id}'.\n";
            return false;
        } else {
            preg_match("/(\s*)('[^']*'\s*=>\s*'[^']*'),/", $subject, $matches);
            $replacement = $valueString . "\n" . $marker;
            $content     = str_replace($marker, $replacement, $subject);
            file_put_contents($file, $content);
            echo "Updated configuration array '{$id}'.\n";
            return true;
        }
    }

    private function validateConfigurationChange($configurationString, $marker, $item)
    {
        if (!strstr($configurationString, $marker)) {
            // marker does not exist
            return false;
        } elseif (strstr($configurationString, key($item))) {
            // marker does not exist
            return false;
        } else {
            return true;
        }
    }
}