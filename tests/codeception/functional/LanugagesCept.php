<?php

// @group mandatory

use tests\codeception\_pages\LoginPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that language urls work');

$I->amGoingTo('try to login with correct credentials');
LoginPage::openBy($I)->login('admin', 'admin');
$I->expectTo('see user info');

$I->amOnPage('/xx');
$I->seeResponseCodeIs(404);

$I->amOnPage('/');
$I->seeResponseCodeIs(200);

$I->amOnPage('/de');
$I->seeResponseCodeIs(200);

// Note: redirect needs to be tested in acceptance test
