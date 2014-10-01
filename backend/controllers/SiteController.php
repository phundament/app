<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Default backend controller
 *
 * Usually renders a customized dashboard for logged in users
 */
class SiteController extends Controller
{
    /**
     * @return array Behaviors, eg. access control
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
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array Actions defined in classes, eg. error page
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
     * @return string Application dashboard
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
