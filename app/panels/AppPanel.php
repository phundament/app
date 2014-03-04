<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace app\panels;

use Yii;
use yii\debug\Panel;
use yii\log\Logger;
use yii\debug\models\search\Profile;

/**
 * Application panel
 * @author Tobias Munk <schmunk@usrbin.de>
 * @since 4.0
 */
class AppPanel extends Panel
{
    /**
     * @var array current request profile timings
     */
    private $_models;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Backend';
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render(
                              '//panels/app/summary',
                                  [
                                      'panel' => $this
                                  ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getDetail()
    {
        return Yii::$app->view->render(
                              '//panels/app/detail',
                                  [
                                      'panel' => $this,
                                  ]
        );
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        return [];
    }

}
