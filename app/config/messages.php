<?php
/**
 * This is the configuration for generating message translations
 * for the Yii framework. It is used by the 'app/yiic message app/config/messages.php' command.
 */

$vendorPackageRelPath = "";
//$vendorPackageRelPath = "../vendor/phundament/p3pages";

return array(
    'sourcePath'  => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $vendorPackageRelPath,
    'messagePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $vendorPackageRelPath . DIRECTORY_SEPARATOR . 'messages',
    'languages'   => array('en', 'de', 'lv'),
    'fileTypes'   => array('php'),
    'overwrite'   => true,
    'exclude'     => array(
        '.svn',
        '.gitignore',
        'yiilite.php',
        'yiit.php',
        '/i18n/data',
        '/messages',
        '/migrations',
        '/web/js',
        '/extensions',
        '/runtime',
        '/config',
        '/tests',
    ),
);
