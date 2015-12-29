<?php

use yii\db\Migration;

class m150917_193929_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        if ($auth instanceof \yii\rbac\DbManager) {
            $guest = $auth->createRole('Public');
            $guest->description = 'Unauthenticated User';
            $auth->add($guest);

            $editor = $auth->createRole('Editor');
            $editor->description = 'prototype editor';
            $auth->add($editor);

            $permission = $auth->createPermission('backend_default');
            $permission->description = 'Backend Dashboard';
            $auth->add($permission);

            $permission = $auth->createPermission('app_site');
            $permission->description = 'Main Site Controller';
            $auth->add($permission);

            $auth->addChild($editor, $auth->getPermission('backend_default'));
            $auth->addChild($editor, $auth->getPermission('app_site'));

            $auth->addChild($editor, $auth->getPermission('pages'));
        } else {
            throw new \yii\base\Exception('Application authManager must be an instance of \yii\rbac\DbManager');
        }
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        if ($auth instanceof \yii\rbac\DbManager) {
            $auth->remove($auth->getPermission('backend_default'));
            $auth->remove($auth->getPermission('app_site'));
            $auth->remove($auth->getRole('Editor'));
            $auth->remove($auth->getRole('Public'));
        } else {
            throw new \yii\base\Exception('Application authManager must be an instance of \yii\rbac\DbManager');
        }
    }
}
