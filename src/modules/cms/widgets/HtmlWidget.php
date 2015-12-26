<?php
/**
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace app\modules\cms\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class HtmlWidget extends Widget
{
    const SETTINGS_SECTION = 'app.html';
    const ACCESS_ROLE = 'Editor';

    public function run()
    {
        $html = \app\modules\cms\models\Html::findOne(['key' => $this->generateKey()]);

        if (\Yii::$app->user->can(self::ACCESS_ROLE)) {
            $settingsModule = Html::a('CMS module', ['/cms/html']);
            \Yii::$app->session->addFlash(
                ($html) ? 'success' : 'info',
                "Edit contents in {$settingsModule}, key: <code>{$this->generateKey()}</code>"
            );
        }

        return $html ? $html->value : null;
    }

    private function generateKey()
    {
        $id = \Yii::$app->request->getQueryParam('id');
        return \Yii::$app->language.'/'.\Yii::$app->controller->route.($id ? '/'.$id : '');
    }
}
