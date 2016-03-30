<div class="row">
    <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    ID
                </h3>

                <p>
                    <?= getenv('APP_NAME') ?>
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-home"></i>
            </div>
            <a href="<?= \yii\helpers\Url::to('site/index') ?>" class="small-box-footer">
                Homepage <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->

    <?php if (Yii::$app->user->identity->isAdmin): ?>

        <div class="col-md-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?= \dektrium\user\models\User::find()->count() ?>
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
            <div class="small-box bg-orange">
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
                <a href="<?= \yii\helpers\Url::to(['/backend/default/view-config']) ?>" class="small-box-footer">
                    Configuration <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>

        </div>
        <!-- ./col -->

        <div class="col-md-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        <?= YII_ENV ?>
                    </h3>

                    <p>
                        <?= APP_VERSION ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-grid"></i>
                </div>
                <a href="<?= \yii\helpers\Url::to(['/debug']) ?>" class="small-box-footer">
                    Debug <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    <?php endif; ?>

</div>

<?= \dmstr\modules\prototype\widgets\HtmlWidget::widget(['enableFlash' => true]); ?>