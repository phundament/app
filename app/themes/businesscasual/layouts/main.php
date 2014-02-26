<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\themes\businesscasual\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string        $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Business Casual Template for Bootstrap</title>
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>
    <div class="brand"><?= \Yii::$app->name ?></div>
    <div class="address-bar">The Plaza | 5483 Start Bootstrap Ave. | Beverly Hills, California 26892 | 555.519.2013
    </div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= Html::url(['/site/index']) ?>">Home</a>
                    </li>
                    <li><a href="<?= Html::url(['/site/about']) ?>">About</a>
                    </li>
                    <li><a href="<?= Html::url(['/site/contact']) ?>">Blog</a>
                    </li>
                    <li><a href="<?= Html::url(['/usr/login']) ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <?= $content ?>


    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        // Activates the Carousel
        $('.carousel').carousel({
            interval: 5000
        })
    </script>
    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>