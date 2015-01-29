<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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

    public function init(){
        parent::init();
        \Yii::$app->getAssetManager()->bundles['yii\bootstrap\BootstrapAsset'] = false;
        // "forceCopy" for this bundle only
        /*if (YII_ENV_DEV) {
            touch(\Yii::getAlias($this->sourcePath));
        }*/        
    }

    public function registerAssetFiles($view) {
        #$view->getAssetManager()->bundles['yii\bootstrap\BootstrapAsset'] = ['css'=>false];
        #var_dump($view->getAssetManager()->bundles);exit;
        parent::registerAssetFiles($view);
        #$view->getAssetManager()->bundles['yii\bootstrap\BootstrapAsset'] = false;

    }
}
