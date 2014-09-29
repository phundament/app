<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<!--    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <div class="body-content">

        <div class="row">
            <div class="col-sm-4">
                <h2>Users</h2>

                <p>Manage user accounts.</p>

                <p>
                    <?= \yii\helpers\Html::a('User Administration',['/user/admin'], ['class'=>'btn btn-default']) ?>
                </p>
            </div>
            <!--<div class="col-sm-4">
                <h2>Packages</h2>

                <p>View extension information and search for addons.</p>

                <p>
                    <?= \yii\helpers\Html::a('Package Browser',['/packaii/'], ['class'=>'btn btn-default']) ?>
                </p>

            </div>
            <div class="col-sm-4">
                <h2>Support</h2>

                <p>Online resources.</p>

                <p>
                    <?= \yii\helpers\Html::a('Issues', 'http://github.com/phundament/app/issues', ['class'=>'btn btn-info']) ?>
                </p>
            </div>-->
        </div>

    </div>
</div>
