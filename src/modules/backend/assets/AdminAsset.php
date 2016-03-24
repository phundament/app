<?php

namespace app\modules\backend\assets;

/*
 * @link http://www.yiiframework.com/
 *
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

use yii\helpers\FileHelper;
use yii\web\AssetBundle;

/**
 * Configuration for `backend` client script files.
 *
 * @since 4.0
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/backend/assets/web';

    public $css = [
        'less/site.less',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'dmstr\web\AdminLteAsset',
    ];

    public function init()
    {
        parent::init();
        // we recompile the less files from 'yii\bootstrap\BootstrapAsset' and include the css in app.css
        // therefore we set bundle to false
        \Yii::$app->getAssetManager()->bundles['yii\bootstrap\BootstrapAsset'] = false;

        // /!\ CSS/LESS development only setting /!\
        // Touch the asset folder with the highest mtime of all contained files
        // This will create a new folder in web/assets for every change and request
        // made to the app assets.
        if (getenv('APP_ASSET_FORCE_PUBLISH')) {
            $files = FileHelper::findFiles(\Yii::getAlias($this->sourcePath));
            $mtimes = [];
            foreach ($files as $file) {
                $mtimes[] = filemtime($file);
            }
            touch(\Yii::getAlias($this->sourcePath), max($mtimes));
        }
    }
}
