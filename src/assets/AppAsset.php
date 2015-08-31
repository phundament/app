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
    public $sourcePath = '@app/assets/web';

    public $css = [
        'css/app.css',
    ];
    public $js = [
        'js/app.js',
    ];
    
    // we recompile the less files from 'yii\bootstrap\BootstrapAsset' and include the css in app.css
    // therefore we set bundle to false in application config
    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init()
    {
        parent::init();

        // /!\ CSS/LESS development only setting /!\
        // Touch the asset folder with the highest mtime of all contained files
        // This will create a new folder in web/assets for every change and request
        // made to the app assets.
        if (getenv('APP_ASSET_FORCE_PUBLISH')) {
            $files  = FileHelper::findFiles(\Yii::getAlias($this->sourcePath));
            $mtimes = [];
            foreach ($files AS $file) {
                $mtimes[] = filemtime($file);
            }
            touch(\Yii::getAlias($this->sourcePath), max($mtimes));
        }
    }
}
