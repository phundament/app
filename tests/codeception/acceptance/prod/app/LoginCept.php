<?php

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that login works');

$loginPage = LoginPage::openBy($I);

$I->see('Sign in', 'h3');

$I->amGoingTo('try to login with correct credentials');
$loginPage->login('admin', 'admin');
$I->makeScreenshot('login-success');

$I->expectTo('see user info');
$I->click('.nav #link-user-menu a');
#$i->wait(1);

$I->seeElement('#link-logout');
$I->click('#link-logout');
$I->makeScreenshot('logout-success');
