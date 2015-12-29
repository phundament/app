<?php

namespace app\modules\cms\controllers\api;

/**
 * This is the class for REST controller "LessController".
 */

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class LessController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\modules\cms\models\Less';
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'matchCallback' => function ($rule, $action) {return \Yii::$app->user->can($this->module->id . '_' . $this->id . '_' . $action->id, ['route' => true]);},
                        ]
                    ]
                ]
            ]
        );
    }
}
