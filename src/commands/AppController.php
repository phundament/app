<?php

namespace app\commands;

/*
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2014 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use dektrium\user\Finder;
use mikehaertl\shellcommand\Command;
use yii\console\Controller;

/**
 * Task runner command for development.
 *
 * @author Tobias Munk <tobias@diemeisterei.de>
 */
class AppController extends Controller
{
    public $defaultAction = 'version';

    /**
     * Displays application version from ENV variable (read from version file).
     */
    public function actionVersion()
    {
        $this->stdout(\Yii::$app->id.' version '.APP_VERSION);
        $this->stdout("\n");
    }

    /**
     * Setup admin user (create, update password, confirm).
     */
    public function actionSetupAdminUser()
    {
        $finder = \Yii::$container->get(Finder::className());
        $admin = $finder->findUserByUsername('admin');
        if ($admin === null) {
            $email = $this->prompt(
                'E-Mail for application admin user:',
                ['default' => getenv('APP_ADMIN_EMAIL')]
            );
            $this->action('user/create', [$email, 'admin']);
            $password = $this->prompt(
                'Password for application admin user:',
                ['default' => getenv('APP_ADMIN_PASSWORD')]
            );
        } else {
            $password = $this->prompt(
                'Update password for application admin user (leave empty to skip):'
            );
        }
        if ($password) {
            $this->action('user/password', ['admin', $password]);
        }
        sleep(1); // confirmation may not succeed without a short pause
        $this->action('user/confirm', ['admin']);
    }

    /**
     * Clear [application]/web/assets folder.
     */
    public function actionClearAssets()
    {
        $assets = \Yii::getAlias('@web/assets');

        // Matches from 7-8 char folder names, the 8. char is optional
        $matchRegex = '"^[a-z0-9][a-z0-9][a-z0-9][a-z0-9][a-z0-9][a-z0-9][a-z0-9]\?[a-z0-9]$"';

        // create $cmd command
        $cmd = 'cd "'.$assets.'" && ls | grep -e '.$matchRegex.' | xargs rm -rf ';

        // Set command
        $command = new Command($cmd);

        // Prompt user
        $delete = $this->confirm("\nDo you really want to delete web assets?", true);

        if ($delete) {
            // Try to execute $command
            if ($command->execute()) {
                echo "Web assets have been deleted.\n\n";
            } else {
                echo "\n".$command->getError()."\n";
                echo $command->getStdErr();
            }
        }
    }

    /**
     * Generate application and required vendor documentation.
     */
    public function actionGenerateDocs()
    {
        if ($this->confirm('Regenerate documentation files into ./docs-html', true)) {

            // array with commands
            $commands = [];
            $commands[] = 'vendor/bin/apidoc guide --interactive=0 docs web/apidocs';
            $commands[] = 'vendor/bin/apidoc api --interactive=0 --exclude=runtime/,tests/ src,vendor/schmunk42 web/apidocs';
            $commands[] = 'vendor/bin/apidoc guide --interactive=0 docs web/apidocs';

            foreach ($commands as $command) {
                $cmd = new Command($command);
                if ($cmd->execute()) {
                    echo $cmd->getOutput();
                } else {
                    echo $cmd->getOutput();
                    echo $cmd->getStdErr();
                    echo $cmd->getError();
                }
            }
        }
    }

    /**
     * @param string $command
     */
    protected function action($command, $params = [])
    {
        echo "\nRunning action '$command'...\n";
        \Yii::$app->runAction($command, $params);
    }
}
