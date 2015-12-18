<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\assets;

use yii\caching\FileDependency;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\AssetBundle;

class SettingsAsset extends AssetBundle
{
    const CACHE_ID = 'app\assets\SettingsAsset';
    const SETTINGS_KEY = 'app.less';
    const MAIN_LESS_FILE = 'main.less';

    public $sourcePath = '@runtime/settings-asset';

    public $css = [
        self::MAIN_LESS_FILE,
    ];

    public $depends = [
        // if a full Bootstrap CSS is compiled, it's recommended to disable the asset in assetManager configuration
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();

        $sourcePath = \Yii::getAlias($this->sourcePath);
        @mkdir($sourcePath);
        $config = \Yii::$app->settings->getRawConfig();

        if (isset($config[self::SETTINGS_KEY])) {
            $hash = sha1(Json::encode($config[self::SETTINGS_KEY]));
            if ($hash !== \Yii::$app->cache->get(self::CACHE_ID)) {

                $lessFiles = FileHelper::findFiles($sourcePath, ['only' => ['*.less']]);
                foreach ($lessFiles AS $file) {
                    unlink($file);
                }
                foreach ($config[self::SETTINGS_KEY] AS $key => $value) {
                    file_put_contents("$sourcePath/$key.less", $value[0]);
                }

                $dependency = new FileDependency();
                $dependency->fileName = __FILE__;
                \Yii::$app->cache->set(self::CACHE_ID, $hash, 0, $dependency);
                @touch($sourcePath);
            }
        }
    }

}