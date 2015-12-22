<?php
/**
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class HtmlWidget extends Widget
{
    const SETTINGS_SECTION = 'app.html';
    const ACCESS_ROLE = 'Editor';

    public function run()
    {
        $html = \Yii::$app->settings->get($this->generateKey(), self::SETTINGS_SECTION, null);
        if (\Yii::$app->user->can(self::ACCESS_ROLE)) {
            $settingsModule = Html::a('settings module', ['/settings']);
            \Yii::$app->session->addFlash(
                ($html) ? 'success' : 'info',
                "Edit contents in {$settingsModule}, section: <code>".self::SETTINGS_SECTION."</code> key: <code>{$this->generateKey()}</code>"
            );
        }
        return $html;
    }

    private function generateKey()
    {
        $id = \Yii::$app->request->getQueryParam('id');
        return \Yii::$app->language.'/'.\Yii::$app->controller->route.($id ? '/'.$id : '');
    }
}
