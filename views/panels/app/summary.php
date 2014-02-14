<?php
use \yii\helpers\Html;

?>

<div class="yii-debug-toolbar-block">
    <a href="<?= Yii::$app->homeUrl ?>" class="label label-success">
        <span class="glyphicon glyphicon-home"></span>
    </a>
</div>

<div class="yii-debug-toolbar-block">
    <a href="<?= Html::url(['/packaii']) ?>" class="label label-important">
        <span class="glyphicon glyphicon-gift"></span>
        Packaii
    </a>
</div>

<div class="yii-debug-toolbar-block">
    <a href="<?= Html::url(['/gii']) ?>" class="label label-important">
        <span class="glyphicon glyphicon-wrench"></span>
        Gii
    </a>
</div>

<div class="yii-debug-toolbar-block">
    <a href="<?= Html::url(['/debug/default/view', 'panel' => 'app']) ?>" class="label label-inverse">
        <span class="glyphicon glyphicon-cog"></span>
        Backend
    </a>
</div>
