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
class ComposerCallback
{
    /**
     * Displays application initialization instructions
     *
     * @param Event $event
     */
    public static function createProject(Event $event)
    {
        $path = realpath(dirname(__FILE__).'/../../');
        echo "\nPhundament application packages have been successfully installed.";
        echo "\nPlease choose your environment with\n";
        echo "\n  cd $path";
        echo "\n  ./init";
        echo "\n\n";
    }
}