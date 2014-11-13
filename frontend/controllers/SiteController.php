<?php
namespace frontend\controllers;

use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash(
                    'success',
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render(
                'contact',
                [
                    'model' => $model,
                ]
            );
        }
    }

    public function actionDocs($file = '10-about.md')
    {
        // TOOD: DRY(!)
        $cacheKey = 'github-markdown/toc';
        $toc      = \Yii::$app->cache->get($cacheKey);
        if (!$toc) {
            $toc = $this->createHtml('README.md');
            \Yii::$app->cache->set($cacheKey, $toc, 300);
        }

        $cacheKey = 'github-markdown/' . $file;
        $html     = \Yii::$app->cache->get($cacheKey);
        if (!$html) {
            $html = $this->createHtml($file);
            \Yii::$app->cache->set($cacheKey, $html, 300);
        }

        $this->layout = 'container';
        return $this->render(
            'docs',
            [
                'html'     => $html,
                'toc'      => $toc,
                'headline' => $file,
                'forkUrl'  => 'https://github.com/phundament/app/blob/master/docs/' . $file
            ]
        );
    }

    private function createHtml($file)
    {
        $markdown = file_get_contents('https://raw.githubusercontent.com/phundament/app/master/docs/' . $file);
        $html     = Markdown::process($markdown, 'gfm');
        $url      = Url::to(['site/docs', 'file' => '']);
        $html     = preg_replace('/<a href="(?!http)(.+\.md)">/U', '<a href="__URL__/$1">', $html);
        $trans    = ['__URL__' => $url];
        $html     = strtr($html, $trans);
        return $html;
    }

}
