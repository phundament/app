<?php
$this->title = $headline;
$this->params['breadcrumbs'][] = ['url' => ['docs'], 'label' => 'Docs'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="docs">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12 pull-right">
            <?= $html ?>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pull-left">
            <div class="toc well">
                <?= $toc ?>
            </div>
        </div>
    </div>
    <p class="text-muted text-right small">
        <br/><br/>
        Help us to improve the documentation, <?= \yii\helpers\Html::a(
            'fork this page',
            $forkUrl,
            ['target' => '_blank']
        ) ?> on GitHub.
    </p>
</div>
