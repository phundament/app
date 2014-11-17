<?php

use yii\helpers\Html;

?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
            <div class="text-center">
                <h2>
                    <?= Html::img('http://t.phundament.com/p4-128.png') ?>
                </h2>

                <h3>Realized by</h3>

                <p>
                    <b><?= Html::a('diemeisterei GmbH, Stuttgart', 'http://diemeisterei.de') ?></b>
                </p>

                <h3>Build with</h3>

                <p>
                    <?= Html::a('Phundament', 'http://phundament.com') ?>,
                    <?= Html::a('Yii', 'http://yiiframework.com') ?>,
                    <?= Html::a('composer', 'http://getcomposer.org') ?>
                </p>
            </div>
        </div>
    </div>
</div>
