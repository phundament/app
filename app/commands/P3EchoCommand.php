<?php
/**
 * WebAppCommand class file.
 */

/**
 * P3EchoCommand outputs a message
 */

Yii::import('system.cli.commands.*');
class P3EchoCommand extends CConsoleCommand
{
    public $message;

    public function getHelp()
    {
        return <<<EOD
USAGE
  yiic p3echo <message>

DESCRIPTION
  This command outputs a message

PARAMETERS
 * message: a string

EOD;
    }

    /**
     * Execute the action.
     *
     * @param array $args command line parameters specific for this command
     */
    public function run($args)
    {
        if (!empty($args[0]))
            echo "{$args[0]}\n";
    }
}