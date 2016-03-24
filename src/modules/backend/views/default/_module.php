<?php

namespace _;

use yii\bootstrap\Collapse;
use yii\data\ArrayDataProvider;
use yii\widgets\ListView;

/* @var $this \yii\web\View */

?>

<?php $this->beginBlock('routes') ?>

<?php
$controllerDataProvider = new ArrayDataProvider(
    [
        'allModels' => \dmstr\helpers\Metadata::getModuleControllers($key),
    ]
);
?>

<?= ListView::widget(
    [
        'dataProvider' => $controllerDataProvider,
        'layout' => "{items}\n{pager}",
        'itemView' => '_controller',
    ]
)
?>

<?php $this->endBlock() ?>


<?= Collapse::widget(
    [
        'encodeLabels' => false,
        'items' => [
            [
                'label' => $key.' '.(is_object($model) ? '<span class="label label-info">loaded</span>' : ''),
                'content' => $this->blocks['routes'],
            ],
        ],
    ]
); ?>

