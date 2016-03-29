<?php

// @group optional

use tests\codeception\_pages\LoginPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that login works');

$I->amGoingTo('try to login with correct credentials');
LoginPage::openBy($I)->login('admin', 'admin');
$I->expectTo('see user info');

$I->amOnPage('/');
$I->see('en/site/index','.label');

$I->amOnPage('/backend');
$I->see('admin', '.user-panel');
