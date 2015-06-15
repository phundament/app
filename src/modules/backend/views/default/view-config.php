<h2>Application</h2>
<?php foreach ($config AS $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= \yii\helpers\Json::encode($element, JSON_PRETTY_PRINT) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>

<h2>Modules</h2>
<?php foreach ($modules AS $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= \yii\helpers\Json::encode($element, JSON_PRETTY_PRINT) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>

<h2>Components</h2>
<?php foreach ($components AS $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= \yii\helpers\Json::encode($element, JSON_PRETTY_PRINT) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>

<h2>Params</h2>
<?php foreach ($params AS $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= \yii\helpers\Json::encode($element, JSON_PRETTY_PRINT) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>