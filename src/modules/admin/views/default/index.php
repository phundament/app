<div class="row">
    <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    &nbsp;
                </h3>

                <p>
                    Users
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/user/admin']) ?>" class="small-box-footer">
                Manage <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>
                    <?= count(\Yii::$app->getModule('admin')->getControllers()) ?>
                </h3>

                <p>
                    Application Controllers
                </p>
            </div>
            <div class="icon bg-">
                <i class="ion ion-home"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/']) ?>" class="small-box-footer">
                Homepage <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-gray">
            <div class="inner">
                <h3>
                    <?= count(\Yii::$app->getModules()) ?>
                </h3>

                <p>
                    Modules
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to('http://packagist.com') ?>" class="small-box-footer" target="_blank">
                Browse Packages <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>
    <!-- ./col -->

    <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-<?= strstr(getenv('APP_VERSION'),'dirty')?'orange':'green' ?>">
            <div class="inner">
                <h3>
                    <?= YII_ENV ?>
                </h3>

                <p>
                    <?= getenv('APP_VERSION') ?>
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to(['view-config']) ?>" class="small-box-footer">
                Application Configuration <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-sm-6">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Application Controllers</h3>
            </div>
            <div class="box-body">
                <?php
                foreach (\Yii::$app->getModule('admin')->getControllers() AS $i => $controller) {
                    echo yii\helpers\Html::a(
                        $controller,
                        ['/' . $controller],
                        ['class' => 'btn btn-default btn-block btn-flat']
                    );
                }
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="callout callout-info">
            <h4>Prepare the test-suites!</h4>

            <p>Use <code>./yii app/setup-tests</code> to initialize codeception.</p>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-sm-6">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Online Documentation</h3>
            </div>
            <div class="box-body">
                <div class="alert alert-warning">
                    <i class="fa fa-warning"></i>
                    <b>Notice!</b> Use <code>./yii app/setup-docs</code> and <code>./yii app/generate-docs</code> to
                    create the local HTML documentation for this application.
                </div>
                <p>

                    <?= yii\helpers\Html::a(
                        'Phundament Guide',
                        'http://phundament.com/docs',
                        ['target' => '_blank', 'class' => 'btn btn-default btn-block btn-flat']
                    ); ?>

                </p>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <small>Need help? Get <?= yii\helpers\Html::a(
                        'support',
                        'mailto:' . \Yii::$app->params['supportEmail']
                    ); ?>.
                </small>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </div>
</div>
