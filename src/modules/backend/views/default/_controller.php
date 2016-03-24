<?php

namespace _;

use dmstr\helpers\Metadata;
use Yii;
use yii\helpers\Html;

?>

<b><?= Html::a($model['route'], $model['route']) ?></b>

<br/>

<?php
$controller = Yii::$app->createController($model['module'].'/'.$model['name']);
foreach (Metadata::getControllerActions($controller[0]) as $action) {
    echo Html::a($action['route'], [$action['route']]).'<br/>';
}
?>

<hr/>
