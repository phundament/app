<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace console\helpers;

use Composer\Script\Event;

/**
 * Defines callbacks for composer
 *
 * @package console\helpers
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class ComposerCommand
{
    private static $config;
    private static $isYiiInitialized;

    /**
     * Application initialization
     * @param Event $event
     */
    public static function init(Event $event)
    {
        require(__DIR__ . '/../../init');
        self::yii(['phundament/init']);
        echo "\nScript-hook 'init' completed.\n\n";
    }

    /**
     * Yii console bootstrap
     */
    private static function initializeYii()
    {
        defined('YII_DEBUG') or define('YII_DEBUG', true);
        defined('YII_ENV') or define('YII_ENV', 'dev');

        // fcgi doesn't have STDIN and STDOUT defined by default
        defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));
        defined('STDOUT') or define('STDOUT', fopen('php://stdout', 'w'));

        $basePath = __DIR__ . '/../../';
        require($basePath . '/vendor/autoload.php');
        require($basePath . '/vendor/yiisoft/yii2/Yii.php');
        require($basePath . '/common/config/aliases.php');

        self::$config = \yii\helpers\ArrayHelper::merge(
            require($basePath . '/common/config/main.php'),
            require($basePath . '/common/config/main-local.php'),
            require($basePath . '/console/config/main.php'),
            require($basePath . '/console/config/main-local.php')
        );

        self::$isYiiInitialized = true;
    }

    private static function yii($argv)
    {
        if (!self::$isYiiInitialized) {
            self::initializeYii();
        }
        $_SERVER['argv'] = array_merge(['./yii'], $argv);
        $application     = new \yii\console\Application(self::$config);
        $exitCode        = $application->run();
        if ($exitCode !== 0) {
            exit($exitCode);
        } else {
            // continue ... eg. for usage in composer scripts
        }
    }
}