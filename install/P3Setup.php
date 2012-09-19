<?php

namespace install;

use Composer\Script\Event;

class P3Setup
{

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

    public static function postInstall(Event $event)
    {
        $app = self::getYiiApplication();

        $args = array('yiic', 'p3webapp', realpath(dirname(__FILE__) . '/..'));
        $app->commandRunner->run($args);

        $args = array('yiic', 'migrate');
        $app->commandRunner->run($args);

        echo "\n\nInstallation completed.\n\nThank you for choosing Phundament 3!\n\n";
    }

    public static function preUpdate(Event $event)
    {
        $composer = $event->getComposer();
        // do stuff
        echo "Welcome to Phundament Installation 3 via composer\n\nUpdating your application to the lastest available packages...\n";
    }

    public static function postUpdate(Event $event)
    {
        $app = self::getYiiApplication();

        $args = array('yiic', 'migrate');
        $app->commandRunner->run($args);

        echo "\n\nUpdate completed.\n\n";
    }

    public static function postPackageInstall(Event $event)
    {
        self::runComposerCommand($event);        
    }

    public static function postPackageUpdate(Event $event)
    {
        self::runComposerCommand($event);        
    }
    
    /**
     * Asks user to confirm by typing y or n.
     *
     * Credits to Yii CConsoleCommand
     *
     * @param string $message to echo out before waiting for user input
     * @return bool if user confirmed
     *
     * @since 0.5
     */
    public static function confirm($message)
    {
        echo $message . ' [yes|no] ';
        return !strncasecmp(trim(fgets(STDIN)), 'y', 1);
    }


    private static function runComposerCommand(Event $event){
        $app = self::getYiiApplication();
        if ($app === null) return;
        
        $installedPackage = $event->getOperation()->getPackage();
        $commandName = $installedPackage->getPrettyName().'-installer';
        if (isset($app->commandMap[$commandName])) {
            $args = array('yiic', $commandName);
            $app->commandRunner->run($args);        
        }
    }

    private static function getYiiApplication()
    {
        if (!is_file(dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php')) 
        {
            return null;
        }

        require_once(dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php');
        spl_autoload_register(array('YiiBase', 'autoload'));

        if (\Yii::app() === null) {
            $config = dirname(__FILE__) . '/../config/console.php';
            $app = \Yii::createConsoleApplication($config);
        } else {
            $app = \Yii::app();
        }
        return $app;
    }

}
