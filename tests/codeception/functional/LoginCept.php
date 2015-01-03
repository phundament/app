<?php

use tests\codeception\_pages\LoginPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that login works');

$loginPage = LoginPage::openBy($I);

$I->see('Sign In', 'h3');

$I->amGoingTo('try to login with empty credentials');
$loginPage->login('', '');
$I->expectTo('see validations errors');
$I->see('Login cannot be blank.');
$I->see('Password cannot be blank.');

$I->amGoingTo('try to login with wrong credentials');
$loginPage->login('admin', 'wrong');
$I->expectTo('see validations errors');
$I->see('Invalid login or password');

$I->amGoingTo('try to login with correct credentials');
$loginPage->login('admin', 'admin');
$I->expectTo('see user info');
$I->see('','#link-logout');
