<?php
namespace app\controllers;

use common\models\LoginForm;
use app\models\ContactForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use Yii;
use yii\helpers\Markdown;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Renders the start page
     * @return string
     */
    public function actionIndex()
    {
        // SEO meta tags
        $this->view->registerMetaTag(
            [
                'name'    => 'keywords',
                'content' => 'Phundament,Yii,Yii2,app,application,template,12factor,PHP,docker,vagrant,fig'
            ],
            'keywords'
        );
        $this->view->registerMetaTag(
            [
                'name'    => 'description',
                'content' => 'Phundament 4 - 12factor PHP Web Application Template for Yii 2.0 Framework with Docker, fig, Vagrant, PaaS, cloud deployment and AWS EC2 support.'
            ],
            'description'
        );
        return $this->render('index');
    }

    /**
     * Renders the contact page
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Renders the start page
     * @return string
     */
    public function actionAbout()
    {
        $this->layout = 'container';
        return $this->render('about');
    }
}
