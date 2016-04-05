<?php

namespace _;

use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\widgets\ListView;

?>

<h1>Configuration</h1>

<h2>Controllers</h2>
<div class="box">
    <?= ListView::widget(
        [
            'dataProvider' => $loadedModulesDataProvider,
            'itemView' => '_module',
        ]
    )
    ?>
</div>


<h2>Params</h2>
<?php foreach ($params as $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= Json::encode($element, JSON_PRETTY_PRINT) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>


<h2>Components</h2>
<?php foreach ($components as $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= Json::encode($element, JSON_PRETTY_PRINT) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>

<h2>Modules</h2>
<?php foreach ($modules as $name => $element): ?>
    <div class="row">
        <div class="col-sm-2">
            <b><?= $name ?></b>
        </div>
        <div class="col-sm-10">
<pre>
<?= VarDumper::dumpAsString($element, 1, true) ?>
</pre>
        </div>
    </div>
<?php endforeach ?>
