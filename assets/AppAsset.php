<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\helpers\FileHelper;
use yii\web\AssetBundle;

/**
 * Configuration for `backend` client script files
 * @since 4.0
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@app/assets/web';

    public $css = [
        'css/app.css',
    ];
    public $js = [
        'js/app.js',
    ];
    public $depends = [
        // we recompile the less files from 'yii\bootstrap\BootstrapAsset' and include the css in app.css,
        // set bundle to false in assetManager config
        'yii\web\YiiAsset',
    ];

    public function init()
    {
        parent::init();
        \Yii::$app->getAssetManager()->bundles['yii\bootstrap\BootstrapAsset'] = false;

        // /!\ CSS/LESS development only setting /!\
        // Touch the asset folder with the highest mtime of all contained files
        // This will create a new folder in web/assets for every change and request
        // made to the app assets.
        if (YII_ENV_DEV) {
            $files  = FileHelper::findFiles(\Yii::getAlias($this->sourcePath));
            $mtimes = [];
            foreach ($files AS $file) {
                $mtimes[] = filemtime($file);
            }
            touch(\Yii::getAlias($this->sourcePath), max($mtimes));
        }
    }
}
