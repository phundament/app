<?php
/* @var $this yii\web\View */
$this->title .= 'Home';
?>

<div class="site-index">

    <?php if (!YII_ENV_PROD): ?>

        <div class="container text-center">
            <h1><?= getenv('APP_TITLE') ?></h1>

            <h2 class="lead">Up and running.</h2>

            <p class="small">
                This is the Home page. You may modify the following file to customize its content:
                <code><?= __FILE__ ?></code>
            </p>

        </div>

    <?php endif; ?>

</div>
