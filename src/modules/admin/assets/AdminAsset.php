<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Configuration for `backend` client script files
 * @since 4.0
 */
class AdminAsset extends AssetBundle
{
    #public $basePath = '@webroot';
    #public $baseUrl = '@web';
    public $sourcePath = '@app/modules/admin/assets/web';

    public $css = [
        'site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'dmstr\web\AdminLteAsset',
    ];
}
