<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <div class="container-layout">
        <div class="container">
            <?=
            \yii\widgets\Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
            ) ?>
        </div>

        <div class="container">
            <?= $content ?>
        </div>
    </div>

<?php $this->endContent(); ?>