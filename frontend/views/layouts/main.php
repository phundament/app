<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title . ' - ' . Yii::$app->params['appName'];
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”viewport” content=”width=1024, minimal-ui”>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin(
        [
            'brandLabel' => Yii::$app->params['appName'],
            'brandUrl'   => Yii::$app->homeUrl,
            'options'    => [
                'class' => 'navbar navbar-fixed-top navbar-bold',
            ],
        ]
    );
    $menuItems = [
        ['label' => 'Docs', 'url' => ['/site/docs']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->hasModule('user')) {
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
        } else {
            $menuItems[] = [
                'label' => '<i class="glyphicon glyphicon-user"></i> ' . Yii::$app->user->identity->username,
                'url'   => ['/user/profile/show', 'id' => \Yii::$app->user->id],
            ];
            $menuItems[] = [
                'label'       => '<i class="glyphicon glyphicon-log-out"></i>',
                'url'         => ['/user/security/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }
    }
    echo Nav::widget(
        [
            'options'      => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'items'        => $menuItems,
        ]
    );
    NavBar::end();
    ?>
    <div class="container">
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </div>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= \Yii::$app->params['copyrightBy'] ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Html::a(
                Html::img('http://t.phundament.com/p4-32-bw.png'),
                'http://phundament.com',
                ['data-toggle' => 'modal', 'data-target' => '#myModal']
            ) ?></p>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <div class="text-center">
                    <h2>
                        <?= Html::img('http://t.phundament.com/p4-128.png') ?>
                    </h2>

                    <h3>Realized by</h3>

                    <p>
                        <b><?= Html::a('diemeisterei GmbH, Stuttgart', 'http://diemeisterei.de') ?></b>
                    </p>

                    <h3>Build with</h3>

                    <p>
                        <?= Html::a('Phundament', 'http://phundament.com') ?>,
                        <?= Html::a('Yii', 'http://yiiframework.com') ?>,
                        <?= Html::a('composer', 'http://getcomposer.org') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
