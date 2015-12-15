<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\components;


use dektrium\user\models\User as UserModel;
use yii\base\Component;
use yii\helpers\Html;

class Helper extends Component
{
    static public function checkApplication()
    {
        self::checkUserSetup();
        self::checkPagesSetup();
    }

    static private function checkUserSetup()
    {
        if (UserModel::find()->where('id != 1')->count() == 0) {
            $link = Html::a('user module', ['/user/admin/create']);
            \Yii::$app->session->addFlash(
                'warning',
                "There is no additional user registered, visit {$link} to create an editor."
            );
        }
    }

    static private function checkPagesSetup()
    {
        if (!\Yii::$app->getModule('pages')->getLocalizedRootNode()) {
            $link = Html::a('pages module', ['/pages']);
            \Yii::$app->session->addFlash(
                'warning',
                "There is no navigation root node, visit {$link} ot create a root node."
            );
        }
    }
}