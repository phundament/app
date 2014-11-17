<?php
/* @var $this yii\web\View */
$this->title .= 'Home';
?>
<div class="site-index ">

<div class="header vert">
    <div class="container">

        <h1>Phundament 4</h1>

        <p class="lead">12factor PHP Application Template for Yii 2.0</p>

        <div>
            <a href="<?= \yii\helpers\Url::to(['site/docs','file'=>'10-about.md']) ?>" class="btn btn-primary btn-lg">Docs</a>
            <a href="#download" class="btn btn-primary btn-lg">Get It!</a>
        </div>

    </div>
</div>

<div class="container">

    <div class="blurb" id="download">
        <div class="text-center">
            <iframe style="margin-left: 40px"
                    src="http://ghbtns.com/github-btn.html?user=phundament&repo=app&type=fork&count=true&size=large"
                    allowtransparency="true" frameborder="0" scrolling="0" width="130" height="30"></iframe>
            <iframe src="http://ghbtns.com/github-btn.html?user=phundament&repo=app&type=watch&count=true&size=large"
                    allowtransparency="true" frameborder="0" scrolling="0" width="170" height="30"></iframe>
        </div>
        <h2 class="text-center">Download</h2>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3><i class="glyphicon glyphicon-download-alt"></i>
                            composer
                        </h3></div>
                    <div class="panel-body text-center">
                        The PHP way.
                        <hr>
                        <code class="lead">
                            composer create-project --stability=beta phundament/app
                        </code>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3><i class="glyphicon glyphicon-compressed"></i> zip</h3>
                    </div>
                    <div class="panel-body text-center">
                        Classic or manual setup.
                        <hr>
                        <a target="_blank" class="btn btn-lg btn-default btn-block"
                           href="https://github.com/phundament/app/tags">Download</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h3><i class="glyphicon glyphicon-download"></i> Docker
                        </h3>
                    </div>
                    <div class="panel-body text-center">
                        Easy orchestration with fig.
                        <hr>
                        <a class="btn btn-lg btn-primary btn-block"
                           href="<?= \yii\helpers\Url::to(['docs', 'file' => '51-fig.md']) ?>">fig up</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3><i class="glyphicon glyphicon-download"></i> vagrant
                        </h3>
                    </div>
                    <div class="panel-body text-center">
                        Use VirtualBox, Docker, AWS, ...
                        <hr>
                        <a class="btn btn-lg btn-primary btn-block"
                           href="<?= \yii\helpers\Url::to(['docs', 'file' => '51-vagrant.md']) ?>">vagrant up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="featurette">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Holistic Approach</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-2 text-center">
                <div class="featurette-item">
                    <a href="<?= \yii\helpers\Url::to(['docs', 'file' => '20-installation.md']) ?>"><i
                            class="glyphicon glyphicon-align-left"></i></a>
                    <h4>Install</h4>

                    <p>Up and running in seconds.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="featurette-item">
                    <a href="<?= \yii\helpers\Url::to(['docs', 'file' => '30-customize.md']) ?>"><i
                            class="glyphicon glyphicon-pencil"></i></a>
                    <h4>Customize</h4>

                    <p>Style, extensions, code-generation.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="featurette-item">
                    <a href="<?= \yii\helpers\Url::to(['docs', 'file' => '40-develop.md']) ?>"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <h4>Develop</h4>

                    <p>A slim and flexible code-base.</p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="featurette-item">
                    <a href="<?= \yii\helpers\Url::to(['docs', 'file' => '50-deploy.md']) ?>"><i
                            class="glyphicon glyphicon-arrow-right"></i></a>
                    <h4>Deploy</h4>

                    <p>On any platform, anywhere.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blurb bright">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>The App</h2></div>
                    <div class="panel-body text-center">How-Tos & more.
                        <hr>
                        <a target="_blank" class="btn btn-lg btn-default btn-block"
                           href="http://docs.phundament.com/4.0/guide-README.html">HTML Guide</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class=" panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>The Code</h2>
                    </div>
                    <div class="panel-body text-center">Classes, methods, variables.
                        <hr>
                        <a target="_blank" class="btn btn-lg btn-default btn-block"
                           href="http://docs.phundament.com/4.0/">HTML API
                            Docs</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>The Extensions</h2>
                    </div>
                    <div class="panel-body text-center">
                        Use any Yii 2.0 package.
                        <hr>
                        <a target="_blank" class="btn btn-lg btn-default btn-block"
                           href="https://packagist.org/search/?type=yii2-extension">Packagist</a>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>The Framework</h2>
                    </div>
                    <div class="panel-body text-center">Core functionality.
                        <hr>
                        <a target="_blank" class="btn btn-lg btn-default btn-block" target="_blank"
                           href="http://www.yiiframework.com/doc-2.0/guide-index.html">Yii 2.0 Definitive Guide</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blurb cite">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Perfection is achieved, not when there is nothing more to add, but when there is nothing left to
                    take away.</h2>

                <p class="lead">Antoine de Saint-Exupery</p>
            </div>
        </div>
    </div>
</div>

<div class="blurb bright">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h3>Need help?</h3>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h2><i class="glyphicon glyphicon-exclamation-sign"></i></h2>
                    </div>
                    <div class="panel-body text-center">
                        Issues.
                        <hr>
                        <a target="_blank"
                           class="btn btn-lg btn-default btn-block"
                           href="https://github.com/phundament/app/issues?q=is%3Aopen+is%3Aissue+milestone%3A4.0">GitHub</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h2><i class="glyphicon glyphicon-question-sign"></i></h2>
                    </div>
                    <div class="panel-body text-center">
                        FAQ.
                        <hr>
                        <a target="_blank"
                           class="btn btn-lg btn-default btn-block"
                           href="http://stackoverflow.com/questions/tagged/phundament?sort=active">Stackoverflow</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>