<?php

/**
 * Class file
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2012 diemeisterei GmbH
 * @license http://www.phundament.com/license
 */

namespace install;
use Composer\Script\Event;

/**
 * P3Setup provides composer hooks
 *
 * This setup class triggers `./yiic migrate` at post-install and post-update.
 * For a package the class triggers `./yiic <vendor/<packageName>-<action>` at post-package-install and
 * post-package-update.
 * See composer manual (http://getcomposer.org/doc/articles/scripts.md)
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package phundament.app
 * @since 0.7.1
 */

defined('YII_PATH') or define('YII_PATH', realpath(dirname(__FILE__).'/../vendor/yiisoft/yii/framework'));
defined('P3_CONSOLE_CONFIG') or define('P3_CONSOLE_CONFIG', realpath(dirname(__FILE__).'/../config/console.php'));

class P3Setup
{
    /**
     * Displays welcome message
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function preInstall(Event $event)
    {
        $composer = $event->getComposer();
        // do stuff
        echo "Welcome to Phundament Installation 3 via composer\n\n";
        echo "This setup script will download all packages specified in composer.json. It will also trigger the creation of a " .
        "web application and invoke the required migrations, please answer the upcoming confirmation questions with [y]es.\n\n";
        if (self::confirm("Install Phundament 3 now?")) {

        } else {
            exit("Installation aborted.\n");
        }
    }

    /**
     * Executes ./yiic migrate
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postInstall(Event $event)
    {
        $app = self::getYiiApplication();
        $args = array('yiic', 'migrate');
        $app->commandRunner->run($args);

        echo "\n\nInstallation completed.\n\nThank you for choosing Phundament 3!\n\n";
    }

    /**
     * Displays welcome message
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function preUpdate(Event $event)
    {
        echo "Welcome to Phundament Installation 3 via composer\n\nUpdating your application to the lastest available packages...\n";
    }

    /**
     * Executes ./yiic migrate
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postUpdate(Event $event)
    {
        $app = self::getYiiApplication();
        $args = array('yiic', 'migrate');
        $app->commandRunner->run($args);

        echo "\n\nUpdate completed.\n\n";
    }

    /**
     * Executes ./yiic <vendor/<packageName>-<action>
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postPackageInstall(Event $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        $commandName = $installedPackage->getPrettyName().'-install';
        self::runCommand($commandName);
    }

    /**
     * Executes ./yiic <vendor/<packageName>-<action>
     *
     * @static
     * @param \Composer\Script\Event $event
     */
    public static function postPackageUpdate(Event $event)
    {
        $installedPackage = $event->getOperation()->getTargetPackage();
        $commandName = $installedPackage->getPrettyName().'-update';
        self::runCommand($commandName);
    }
    
    /**
     * Asks user to confirm by typing y or n.
     *
     * Credits to Yii CConsoleCommand
     *
     * @param string $message to echo out before waiting for user input
     * @return bool if user confirmed
     */
    public static function confirm($message)
    {
        echo $message . ' [yes|no] ';
        return !strncasecmp(trim(fgets(STDIN)), 'y', 1);
    }

    /**
     * Runs Yii command, if available (defined in config/console.php)
     */
    private static function runCommand($commandName){
        $app = self::getYiiApplication();
        if ($app === null) return;
       
        if (isset($app->commandMap[$commandName])) {
            $args = array('yiic', $commandName);
            $app->commandRunner->run($args);        
        }
    }

    /**
     * Creates console application, if Yii is available
     */
    private static function getYiiApplication()
    {
        if (!is_file(YII_PATH.'/yii.php'))
        {
            return null;
        }

        require_once(YII_PATH.'/yii.php');
        spl_autoload_register(array('YiiBase', 'autoload'));

        if (\Yii::app() === null) {
            $config = P3_CONSOLE_CONFIG;
            $app = \Yii::createConsoleApplication($config);
        } else {
            $app = \Yii::app();
        }
        return $app;
    }

}
