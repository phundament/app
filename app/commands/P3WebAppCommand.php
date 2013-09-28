<?php
/**
 * WebAppCommand class file.
 */

/**
 * WebAppCommand creates an Yii Web application at the specified location.
 * Based on Yii Web App Command, modified for Phundament
 */

Yii::import('system.cli.commands.*');
class P3WebAppCommand extends CConsoleCommand
{
    public $path;
    public $interactive = true;
    public $defaultAction = 'create';

    private $_rootPath;

    public function getHelp()
    {
        return <<<EOD
USAGE
  yiic p3webapp <action> <app-path> [<vcs>]

DESCRIPTION
  This command generates a Phundament Web Application at the specified location.

PARAMETERS
 * action: required, eg. 'create' to create a new web application .
 * app-path: required, the directory where the new application will be created.
   If the directory does not exist, it will be created. After the application
   is created, please make sure the directory can be accessed by Web users.
 * vcs: optional, version control system you're going to use in the new project.
   Application generator will create all needed files to the specified VCS
   (such as .gitignore, .gitkeep, etc.). Possible values: git, hg. Do not
   use this argument if you're going to create VCS files yourself.

EOD;
    }

    /**
     * Execute the action.
     *
     * @param array $args command line parameters specific for this command
     */
    public function actionCreate($args)
    {
        $vcs = false;
        if (isset($args[1])) {
            if ($args[1] != 'git' && $args[1] != 'hg') {
                $this->usageError('Unsupported VCS specified. Currently only git and hg supported.');
            }
            $vcs = $args[1];
        }

        if (isset($args[2])) {
            if ($args[2] == 'git' && $args[1] != 'hg') {
                $this->usageError('Unsupported VCS specified. Currently only git and hg supported.');
            }
            $vcs = $args[1];
        }

        if ($this->path) {
            $args[0] = $this->path;
        }
        if (!isset($args[0])) {
            $this->usageError('the Web application location is not specified.');
        }

        $path = strtr($args[0], '/\\', DIRECTORY_SEPARATOR);
        if (strpos($path, DIRECTORY_SEPARATOR) === false) {
            $path = '.' . DIRECTORY_SEPARATOR . $path;
        }
        if (basename($path) == '..') {
            $path .= DIRECTORY_SEPARATOR . '.';
        }
        $dir = rtrim(realpath(dirname($path)), '\\/');
        if ($dir === false || !is_dir($dir)) {
            $this->usageError("The directory '$path' is not valid. Please make sure the parent directory exists.");
        }
        if (basename($path) === '.') {
            $this->_rootPath = $path = $dir;
        } else {
            $this->_rootPath = $path = $dir . DIRECTORY_SEPARATOR . basename($path);
        }

        if ($this->confirm("Create a Web application under '$path'?", true)) {
            $sourceDir = $this->getSourceDir();
            if ($sourceDir === false) {
                die("\nUnable to locate the source directory.\n");
            }
            $ignoreFiles = array();
            $renameMap   = array();
            switch ($vcs) {
                case 'git':
                    $renameMap   = array(
                        'git.gitignore' => '.gitignore',
                        'git.gitkeep'   => '.gitkeep'
                    ); // move with rename git files
                    $ignoreFiles = array('hg.hgignore', 'hg.hgkeep'); // ignore only hg files
                    break;
                case 'hg':
                    $renameMap   = array(
                        'hg.hgignore' => '.hgignore',
                        'hg.hgkeep'   => '.hgkeep'
                    ); // move with rename hg files
                    $ignoreFiles = array('git.gitignore', 'git.gitkeep'); // ignore only git files
                    break;
                default:
                    // no files for renaming
                    $ignoreFiles = array(
                        'git.gitignore',
                        'git.gitkeep',
                        'hg.hgignore',
                        'hg.hgkeep'
                    ); // ignore both git and hg files
                    break;
            }
            $list = $this->buildFileList($sourceDir, $path, '', $ignoreFiles, $renameMap);

            // ask to user about some setings
            echo "\nNote: Your environment configuration will be defined in `main-local.php`";
            if ($this->prompt("\nChoose your environment: 1 development | 2 production", '1') == 2) {
                $list['app/config/main-local.php']['callback'] = array($this, 'callbackReplaceEnvironment');
            } else if ($this->confirm("\nActivate `demo-data` migration?", false)) {
                $list['app/config/console-local.php']['callback'] = array($this, 'callbackEnableDemoData');
                echo "\nNote: Demo data migration module enabled in `console-local.php`.";
            }

            $trans = array(
                "'urlFormat'      => 'get'"=>"'urlFormat'      => 'path'",
                "'showScriptName' => true" => "'showScriptName' => false",
            );
            if ($this->confirm("\nEnable friendly URLs?", false)) {
                // use trans
            } else {
                $trans = array_flip($trans);
            }
            $htacces = $this->getWebrootDir().DIRECTORY_SEPARATOR.'.htaccess';
            file_put_contents($htacces,str_replace('RewriteEngine off','RewriteEngine on', file_get_contents($htacces)));
            $config = $this->getConfigDir().DIRECTORY_SEPARATOR.'main.php';
            file_put_contents($config,strtr(file_get_contents($config),$trans));
            echo "\n";

            // file operations
            $this->copyFiles($list);
            echo "\nSetting permissions";
            $this->setPermissions($path);

            echo "\nYour application has been created successfully under {$path}.";
        } else {
            echo "\nInstallation aborted.\n";
            echo "\n\nInstallation aborted.\n";
            exit(); // do not continue composer process
        }
        echo "\n";
    }


    public function confirm($message, $default = false)
    {
        if ($this->interactive == false) {
            echo $message." ".$default."\n";
            return $default;
        }
        return parent::confirm($message, $default);
    }

    public function prompt($message, $default = false)
    {
        if ($this->interactive == false) {
            echo $message." ".$default."\n";
            return $default;
        }
        return parent::prompt($message, $default);
    }

    /**
     * Adjusts created application file and directory permissions
     *
     * @param string $targetDir path to created application
     */
    protected function setPermissions($targetDir)
    {
        @mkdir($targetDir . '/www/assets');
        @chmod($targetDir . '/www/assets', 0777);
        @mkdir($targetDir . '/www/runtime');
        @chmod($targetDir . '/www/runtime', 0777);
        @mkdir($targetDir . '/app/runtime');
        @chmod($targetDir . '/app/runtime', 0777);
        @mkdir($targetDir . '/app/data');
        @chmod($targetDir . '/app/data', 0777);
        @chmod($targetDir . '/app/data/default.db', 0777);
        @chmod($targetDir . '/app/yiic', 0755);
    }

    /**
     * @return string path to application bootstrap source files
     */
    protected function getSourceDir()
    {
        return realpath(dirname(__FILE__) . '/views/p3-webapp');
    }

    protected function getConfigDir()
    {
        return realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config');
    }

    protected function getWebrootDir()
    {
        return realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'www');
    }

    public function callbackReplaceEnvironment($source, $params)
    {
        $content = file_get_contents($source);
        $content = str_replace("'env' => 'development'","'env' => 'production'", $content);
        return $content;
    }

    public function callbackEnableDemoData($source, $params)
    {
        $content = file_get_contents($source);
        $content = str_replace("#'app-demo-data'", "'app-demo-data'", $content);
        return $content;
    }
}