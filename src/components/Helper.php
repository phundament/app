<?php

namespace app\components;

/*
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use dektrium\user\models\User as UserModel;
use yii\base\Component;
use yii\helpers\Html;

class Helper extends Component
{
    public static function checkApplication()
    {
        if (\Yii::$app->user->can('Admin')) {
            self::checkPassword(getenv('APP_ADMIN_PASSWORD'));
            self::checkUserSetup();
            self::checkPagesSetup();
        }
    }

    private static function checkUserSetup()
    {
        if (UserModel::find()->where('id != 1')->count() == 0) {
            $link = Html::a('user module', ['/user/admin/create']);
            \Yii::$app->session->addFlash(
                'warning',
                "There is no additional user registered, visit {$link} to create an editor."
            );
        }
    }

    private static function checkPagesSetup()
    {
        if (!\Yii::$app->getModule('pages')->getLocalizedRootNode()) {
            $link = Html::a('pages module', ['/pages']);
            \Yii::$app->session->addFlash(
                'warning',
                "There is no navigation root node, visit {$link} to create a root node."
            );
        }
    }

    /**
     * Password check
     * Based upon http://stackoverflow.com/a/10753064.
     *
     * @param $pwd
     */
    private static function checkPassword($pwd)
    {
        $errors = [];

        if (strlen($pwd) < 8) {
            $errors[] = 'Password too short!';
        }

        if (!preg_match('#[0-9]+#', $pwd)) {
            $errors[] = 'Password must include at least one number!';
        }

        if (!preg_match('#[a-zA-Z]+#', $pwd)) {
            $errors[] = 'Password must include at least one letter!';
        }

        if (count($errors) > 0) {
            $msg = implode('<br/>', $errors);
            \Yii::$app->session->addFlash(
                'danger',
                "Application admin password from environment setting is not strong enough.<br/><i>{$msg}</i>"
            );
        }
    }
}
