<?php
use tests\codeception\frontend\FunctionalTester;
$I = new FunctionalTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see(getenv('APP_NAME'));
$I->seeLink('Contact');
$I->click('Docs');
$I->see('About');
