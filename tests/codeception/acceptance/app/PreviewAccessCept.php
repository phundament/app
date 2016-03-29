<?php

// @group mandatory

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that preview access works');

$I->amOnPage('/');
$I->makeScreenshot('debug-preview-access-login');

$loginPage = \tests\codeception\_pages\LoginPage::openBy($I);
$I->amGoingTo('try to login as preview');
$loginPage->login('preview', 'preview1234');
$I->amOnPage('/');
$I->dontSee('.alert');
$I->makeScreenshot('success-preview-access');
