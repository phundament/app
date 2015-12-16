<?php

use tests\codeception\_pages\LoginPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that login works');

$I->amGoingTo('try to login with correct credentials');
LoginPage::openBy($I)->login('admin', 'admin');
$I->expectTo('see user info');

$I->amOnPage('/');
$I->see(getenv('APP_TITLE'));

$I->amOnPage('/backend');
$I->see('admin', '.user-panel');
