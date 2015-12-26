<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\modules\cms\models\Html $model
*/

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Htmls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud html-create">

    <h1>
        <?= Yii::t('app', 'Html') ?>        <small>
                        <?= $model->id ?>        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            Yii::t('app', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
