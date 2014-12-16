<?php
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \app\models\ContactForm */

$this->title                   = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-8">
            <p>
                If you have business inquiries or other questions, please let us know.
            </p>
            <hr>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'subject') ?>
            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
            <?= $form->field($model, 'verifyCode')->widget(
                Captcha::className(),
                [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]
            ) ?>
            <hr>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
        </div>
    </div>

</div>
