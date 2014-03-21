<?php
use \yii\helpers\Url;

?>

<div class="yii-debug-toolbar-block">
    <a href="<?= Yii::$app->homeUrl ?>" class="label label-success">
        <span class="glyphicon glyphicon-home"></span>
    </a>
</div>

<div class="yii-debug-toolbar-block">
    <a href="<?= Url::to(['/gii']) ?>" class="label label-important">
        <span class="glyphicon glyphicon-wrench"></span>
        Gii
    </a>
</div>

<div class="yii-debug-toolbar-block">
    <a href="<?= Url::to(['/debug/default/view', 'panel' => 'app']) ?>" class="label label-inverse">
        <span class="glyphicon glyphicon-cog"></span>
        Backend
    </a>
</div>
