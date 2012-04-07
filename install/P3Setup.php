<?php

namespace install;

use Composer\Script\Event;

class P3Setup {

    public static function preInstall(Event $event) {
        $composer = $event->getComposer();
        // do stuff
        echo "Welcome to Phundament Installation 3 via composer\n\n";
    }

    public static function postInstall(Event $event) {
        $composer = $event->getComposer();
        // do stuff
        echo "\n\nInstallation complete\n\nThank you for choosing Phundament 3!\n";
    }

    /* public static function postUpdate(Event $event)
      {
      $composer = $event->getComposer();
      // do stuff
      } */

    public static function postPackageInstall(Event $event) {
        $installedPackage = $event->getOperation()->getPackage();
        // do stuff
        switch ($installedPackage->getName()) {
            case "yii":
                require_once(dirname(__FILE__) . '/../protected/extensions/yii/framework/yii.php');
                @mkdir(dirname(__FILE__) . '/../runtime', 0777);
                @chmod(dirname(__FILE__) . '/../runtime', 0777);

                $args = array('yiic', 'webapp', realpath(dirname(__FILE__) . '/..'));
                $runner = new \CConsoleCommandRunner();
                $commandPath = \Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
                $runner->addCommands($commandPath);

                $runner->run($args);

                $indexPhp = file_get_contents(dirname(__FILE__) . "/../index.php");
                $indexPhp = str_replace("/protected/config/main.php", "/protected/config/p3.php", $indexPhp);
                file_put_contents(dirname(__FILE__) . "/../index.php", $indexPhp);

                return;

                #ob_start();
                #echo htmlentities(ob_get_clean(), null, \Yii::app()->charset);
                break;
            case "mishamx/yii-user":
                require_once(dirname(__FILE__) . '/../protected/yiic.php');
                $args = array('yiic', 'migrate', '--migrationPath=ext.phundament.p3admin.modules-install.user.migrations', '--migrationTable=migration_module_user', '--interactive=0');
                break;
            case "crisu83/yii-rights":
                require_once(dirname(__FILE__) . '/../protected/yiic.php');
                $args = array('yiic', 'migrate', '--migrationPath=ext.phundament.p3admin.modules-install.rights.migrations', '--migrationTable=migration_module_rights', '--interactive=0');
                break;
            case "phundament/p3media":
                require_once(dirname(__FILE__) . '/../protected/yiic.php');
                @mkdir(dirname(__FILE__) . '/../data/p3media', 0777);
                @mkdir(dirname(__FILE__) . '/../data/p3media-import', 0777);
                @chmod(dirname(__FILE__) . '/../data/p3media', 0777);
                @chmod(dirname(__FILE__) . '/../data/p3media-import', 0777);
                $args = array('yiic', 'migrate', '--migrationPath=ext.phundament.p3media.migrations', '--migrationTable=migration_module_p3media', '--interactive=0');
                break;
            case "phundament/p3widgets":
                require_once(dirname(__FILE__) . '/../protected/yiic.php');
                $args = array('yiic', 'migrate', '--migrationPath=ext.phundament.p3widgets.migrations', '--migrationTable=migration_module_p3widgets', '--interactive=0');
                break;
            case "phundament/p3pages":
                require_once(dirname(__FILE__) . '/../protected/yiic.php');
                $args = array('yiic', 'migrate', '--migrationPath=ext.phundament.p3pages.migrations', '--migrationTable=migration_module_p3pages', '--interactive=0');
                break;
            default:
                return;
        }
        $runner = new \CConsoleCommandRunner();
        $commandPath = \Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
        $runner->addCommands($commandPath);

        $runner->run($args);
    }

}

/*
 *     call yiic.bat migrate --migrationPath=ext.phundament.p3admin.modules-install.user.migrations --migrationTable=migration_module_user --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3admin.modules-install.rights.migrations --migrationTable=migration_module_rights --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3widgets.migrations --migrationTable=migration_module_p3widgets --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3media.migrations --migrationTable=migration_module_p3media --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3pages.migrations --migrationTable=migration_module_p3pages --interactive=0

 */

/*
 *
 *     mkdir ..\runtime
::    chmod 777 ../runtime
    mkdir data\p3media
::    chmod 777 ./data/p3media
    mkdir data\p3media-import
::    chmod 777 ./data/p3media-import
 *
 */