<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title;

switch (Yii::$app->settings->get('registerPrototypeAsset', 'app.assets')) {
    case true:
        \dmstr\modules\prototype\assets\DbAsset::register($this);
        break;
    case null:
        Yii::$app->settings->set('registerPrototypeAsset', true, 'app.assets');
        Yii::$app->settings->deactivate('registerPrototypeAsset', 'app.assets');
    case false:
        AppAsset::register($this);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= \dmstr\modules\prototype\widgets\HtmlWidget::widget(['key' => 'head']) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">

    <?= $this->render('_navbar') ?>
    <div class="alert-wrapper"><?= Alert::widget() ?></div>

    <?= $content ?>
</div>

<footer class="footer">
    <?= \dmstr\modules\prototype\widgets\HtmlWidget::widget(['key' => 'footer']) ?>
    <div class="container">
        <p class="pull-right">
            <span class="label label-default"><?= YII_ENV ?></span>
        </p>
        <p class="pull-left">
            <?= Html::a(
                Html::img('http://t.phundament.com/p4-16-bw.png', ['alt' => 'Icon Phundament 4']),
                '#',
                ['data-toggle' => 'modal', 'data-target' => '#infoModal']
            ) ?>
        </p>
    </div>
</footer>

<!-- Info Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <?= $this->render('_modal') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
