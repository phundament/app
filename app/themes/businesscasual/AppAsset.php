<?php

namespace app\themes\businesscasual;

use yii\web\AssetBundle;

/**
 * @author Tobias Munk <schmunk@usrbin.de>
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = __DIR__;
    #public $basePath = '@webroot';
	#public $baseUrl = '@web';
	public $css = [
		'src/css/business-casual.css',
	];
	public $js = [
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
