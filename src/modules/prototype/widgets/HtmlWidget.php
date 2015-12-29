<?php
/**
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace app\modules\prototype\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class HtmlWidget extends Widget
{
    const SETTINGS_SECTION = 'app.html';
    const ACCESS_ROLE = 'Editor';

    public $key = null;
    public $enableFlash = false;

    public function run()
    {
        $html = \app\modules\prototype\models\Html::findOne(['key' => $this->generateKey()]);

        if (\Yii::$app->user->can(self::ACCESS_ROLE)) {
            $link = ($html) ? $this->generateEditLink($html->id) : $this->generateCreateLink();
            if ($this->enableFlash) {
            \Yii::$app->session->addFlash(
                ($html) ? 'success' : 'info',
                "Edit contents in {$link}, key: <code>{$this->generateKey()}</code>"
            );
            } else {

            }
        }

        return $html ? $html->value : null;
    }

    private function generateKey()
    {
        if ($this->key) {
            return $this->key;
        } else {
            $key = \Yii::$app->request->getQueryParam('id');
        }
        return \Yii::$app->language.'/'.\Yii::$app->controller->route.($key ? '/'.$key : '');
    }

    private function generateCreateLink()
    {
        return Html::a('prototype module', ['/prototype/html/create', 'Html' => ['key' => $this->generateKey()]]);
    }

    private function generateEditLink($id)
    {
        return Html::a('prototype module', ['/prototype/html/update', 'id' => $id]);
    }
}
