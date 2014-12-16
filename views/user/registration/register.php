<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $user
 */
$this->context->layout                  = '@app/views/layouts/main';
$this->title                   = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about container">

    <div class="">
        <div class="row">
            <div class="col-sm-8">
                <h1>Extended Services</h1>
                <p>
                <ul>
                    <li>Enterprise solutions</li>
                    <li>Pre-release programms</li>
                    <li>Beta-testing access</li>
                </ul>
                </p>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(
                            [
                                'id' => 'registration-form',
                            ]
                        ); ?>

                        <?= $form->field($model, 'username') ?>

                        <?= $form->field($model, 'email') ?>

                        <?php if (Yii::$app->getModule('user')->enableGeneratingPassword == false): ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        <?php endif ?>

                        <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <p class="text-center">
                    <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
                </p>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</div>
