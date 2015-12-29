<?php

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that home page is not visible without login');
$I->amOnPage(Yii::$app->homeUrl);
$I->dontSee(getenv('APP_NAME'));
$I->seeLink('Login');
$I->makeScreenshot('home');
