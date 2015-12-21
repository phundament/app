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
            $label = ' <span class="label label-info">'.$this->generateKey().'</span> ';
            $label .= ' <span class="label label-default">'.self::SETTINGS_SECTION.'</span> ';
            if (!$html) {
                $buttons = $this->generateCreateLink();
                $buttons .= $this->generateEditLink();
            } else {
                $buttons = $this->generateEditLink();
            }
            $code = '<div class="">'.$buttons.$label.'</div>'.$html;
        } else {
            $code = $html;
        }

        return $code;
    }

    private function generateCreateLink()
    {
        return Html::a(
            '<i class="glyphicon glyphicon-plus"></i>',
            ['/settings/default/create'],
            ['class' => 'btn btn-default']
        );
    }

    private function generateEditLink()
    {
        return Html::a(
            '<i class="glyphicon glyphicon-wrench"></i>',
            ['/settings/default'],
            ['class' => 'btn btn-default']
        );
    }

    private function generateKey()
    {
        $id = \Yii::$app->request->getQueryParam('id');

        return \Yii::$app->language.'/'.\Yii::$app->controller->route.($id ? '/'.$id : '');
    }
}
