<?php
use tests\codeception\frontend\AcceptanceTester;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see(getenv('APP_NAME'));
$I->seeLink('Contact');
$I->click('Contact');
$I->see('Contact');
