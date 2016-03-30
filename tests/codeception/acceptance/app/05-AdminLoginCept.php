<?php

// @group mandatory

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('login as admin');

$I->amGoingTo('try to login as admin');
$loginPage = LoginPage::openBy($I);
$loginPage->login('admin', 'admin');

$I->see('admin','#link-user-menu');
$I->makeScreenshot('admin-login-frontend');
