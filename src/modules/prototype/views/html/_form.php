<?php

use dmstr\bootstrap\Tabs;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\prototype\models\Html $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="html-form">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'Html',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>

            <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'value')->widget(\trntv\aceeditor\AceEditor::className()) ?>
        </p>
        <?php $this->endBlock(); ?>

        <?=
        Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [[
                    'label' => 'Html',
                    'content' => $this->blocks['main'],
                    'active' => true,
                ],
                ]
            ]
        );
        ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
            '<span class="glyphicon glyphicon-check"></span> '.
            ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
            [
                'id' => 'save-'.$model->formName(),
                'class' => 'btn btn-success'
            ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

