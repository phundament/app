<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\prototype\models\Less $model
 */

$this->title = 'Less '.$model->id.', '.Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Lesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="giiant-crud less-update">

    <h1>
        <?= Yii::t('app', 'Less') ?>
        <small>
            <?= $model->id ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a(
            '<span class="glyphicon glyphicon-eye-open"></span> '.Yii::t('app', 'View'),
            ['view', 'id' => $model->id],
            ['class' => 'btn btn-default']
        ) ?>
    </div>

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ); ?>

</div>
