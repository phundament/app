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
                <a href="<?= \yii\helpers\Url::to('http://phundament.com/docs/31-extension-management.md') ?>"
                   target="_blank"
                   class="btn btn-primary btn-lg">Install Packages</a>
                <a href="<?= \yii\helpers\Url::to('http://phundament.com/docs/41-code-generation.md') ?>"
                   target="_blank"
                   class="btn btn-primary btn-lg">Generate Code</a>
                <a href="<?= \yii\helpers\Url::to('http://phundament.com/docs/30-customize.md') ?>"
                   target="_blank"
                   class="btn btn-primary btn-lg">Customize App</a>
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
                        <a href="<?= \yii\helpers\Url::to(['/debug/default/view', 'panel' => 'log']) ?>"><i
                                class="glyphicon glyphicon-align-left"></i></a>
                        <h4>Logs</h4>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="featurette-item">
                        <a href="<?= \yii\helpers\Url::to(['/admin']) ?>"><i
                                class="glyphicon glyphicon-dashboard"></i></a>
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
                        This is the About page. You may modify the following file to customize its content:


                        <code><?= __FILE__ ?></code></p>

                    <p>Phundament</p>
                </div>
            </div>
        </div>
    </div>

</div>