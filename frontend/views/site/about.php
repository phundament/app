<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title                   = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about container">

    <?php
    echo \yii\helpers\Markdown::process(file_get_contents('https://raw.githubusercontent.com/phundament/app/master/docs/10-about.md'), 'gfm');
    ?>

    <?php if (YII_ENV == 'dev'): ?>
        <hr>
        <p>This is the About page. You may modify the following file to customize its content:</p>
        <div class="pre-scrollable">
            <code><?= __FILE__ ?></code>
        </div>
    <?php endif; ?>
</div>
