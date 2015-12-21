<?php

namespace app\controllers;

use app\components\Helper;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Site controller.
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['error'],
                    ],
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->can(
                                $this->module->id.'_'.$this->id.'_'.$action->id,
                                ['route' => true]
                            );
                        },
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Renders the start page.
     *
     * @return string
     */
    public function actionIndex()
    {
        Helper::checkApplication();

        return $this->render('index');
    }
}
