<?php

use yii\helpers\Html;

?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
            <div class="text-center">
                <?= Html::img('http://t.phundament.com/p4-128-bw.png',['alt'=>'Logo Phundament 4']) ?>

                <h3>Realized by</h3>

                <p>
                    <?= Html::a('diemeisterei GmbH, Stuttgart', 'http://diemeisterei.de') ?>
                </p>

                <h3>Build with</h3>

                <p>
                    <?= Html::a('Phundament 4', 'http://phundament.com') ?>,
                    <?= Html::a('Yii 2', 'http://yiiframework.com') ?>,
                    <?= Html::a('composer', 'http://getcomposer.org') ?>
                </p>

                <p class="small">
                    <?= isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST']:'' ?> | <?= getenv('HOSTNAME') ?: 'local' ?>
                </p>
            </div>
        </div>
    </div>
</div>
