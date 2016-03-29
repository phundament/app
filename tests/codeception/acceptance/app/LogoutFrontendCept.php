<?php

// @group optional

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that logout from frontend works');

$loginPage = LoginPage::openBy($I);

$I->see('Sign in', 'h3');

$I->amGoingTo('try to login with correct credentials');
$loginPage->login('admin', 'admin');
$I->makeScreenshot('login-success');

$I->expectTo('see user info');
$I->click('.nav #link-user-menu a');

$I->amOnPage('/');
$I->click('.dropdown-toggle','.link-user-menu');
$I->click('#link-logout');
$I->dontSee('admin');