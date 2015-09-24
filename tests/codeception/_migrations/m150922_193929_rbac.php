<?php

use yii\db\Migration;

class m150922_193929_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        if ($auth instanceof \yii\rbac\DbManager) {
            $guest = $auth->getRole('Public');
            $auth->addChild($guest, $auth->getPermission('app_site'));
        } else {
            throw new \yii\base\Exception('Application authManager must be an instance of \yii\rbac\DbManager');
        }
    }

    public function down()
    {
        return false;
    }

}
