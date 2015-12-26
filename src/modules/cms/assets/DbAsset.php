<?php
namespace app\modules\cms\assets;

/**
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use app\modules\cms\models\Less;
use yii\caching\FileDependency;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\AssetBundle;

class DbAsset extends AssetBundle
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

        $models = Less::find()->all();
        $hash = sha1(Json::encode($models));

        if ($hash !== \Yii::$app->cache->get(self::CACHE_ID)) {
            $lessFiles = FileHelper::findFiles($sourcePath, ['only' => ['*.less']]);
            foreach ($lessFiles as $file) {
                unlink($file);
            }
            foreach ($models as $model) {
                file_put_contents("$sourcePath/{$model->key}.less", $model->value);
            }

            $dependency = new FileDependency();
            $dependency->fileName = __FILE__;
            \Yii::$app->cache->set(self::CACHE_ID, $hash, 0, $dependency);
            @touch($sourcePath);
        }
    }
}
