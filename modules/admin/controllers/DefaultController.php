<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default backend controller
 *
 * Usually renders a customized dashboard for logged in users
 */
class DefaultController extends Controller
{
    /**
     * Behaviors, eg. access control
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return in_array(
                                \Yii::$app->user->identity->username,
                                \Yii::$app->getModule('user')->admins
                            );
                        }
                    ],
                ]
            ]
        ];
    }

    /**
     * Actions defined in classes, eg. error page
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Application dashboard
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
