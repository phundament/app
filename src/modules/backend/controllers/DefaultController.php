<?php

namespace app\modules\backend\controllers;

use dmstr\helpers\Metadata;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default backend controller.
 *
 * Usually renders a customized dashboard for logged in users
 */
class DefaultController extends Controller
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
     * Actions defined in classes, eg. error page.
     *
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
     * Application dashboard.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Application configuration.
     *
     * @return string
     */
    public function actionViewConfig()
    {
        $config = $GLOBALS['config'];
        $modules = $config['modules'];
        unset($config['modules']);
        $components = $config['components'];
        unset($config['components']);
        $params = $config['params'];
        unset($config['params']);

        $loadedModules = Metadata::getModules();
        $loadedModulesDataProvider = new ArrayDataProvider(['allModels' => $loadedModules]);

        return $this->render(
            'view-config',
            [
                'config' => $config,
                'modules' => $modules,
                'components' => $components,
                'params' => $params,
                'loadedModulesDataProvider' => $loadedModulesDataProvider,
            ]
        );
    }
}
