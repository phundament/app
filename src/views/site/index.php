<?php
/* @var $this yii\web\View */
$this->title .= 'Yii 2.0 App Template';
?>
<div class="site-index ">

    <div class="header vert">
        <div class="container">

            <h1><?= getenv('APP_NAME') ?></h1>

            <h2 class="lead">Up and running.</h2>

            <div>
                <a href="<?= \yii\helpers\Url::to(['/pages']) ?>"
                   class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                    Manage Pages</a>
                <?php if (!YII_ENV_PROD): ?>
                    <p class="lead">
                        <br/>
                       Login with <code>admin</code> / <code>admin</code>
                    </p>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <div class="featurette">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Application</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-4 text-center">
                    <div class="featurette-item">
                        <?php if (YII_ENV_PROD): ?>
                            <a href="#">
                                <i class="glyphicon glyphicon-cog"></i></a>
                            <h4>Production</h4>
                        <?php else: ?>
                            <a href="<?= \yii\helpers\Url::to(['/docs']) ?>">
                                <i class="glyphicon glyphicon-book"></i></a>
                            <h4>Docs</h4>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="featurette-item">
                        <a href="<?= \yii\helpers\Url::to(['/backend']) ?>">
                            <i class="glyphicon glyphicon-dashboard"></i></a>
                        <h4>Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blurb cite">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="lead">
                        This is the Home page. You may modify the following file to customize its content:


                        <code><?= __FILE__ ?></code></p>

                    <p>Phundament</p>
                </div>
            </div>
        </div>
    </div>

</div>
