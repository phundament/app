<?php

// @group mandatory

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('create a preview user');

$I->amGoingTo('try to login with correct credentials');
$loginPage = LoginPage::openBy($I);
$I->see('Sign in', 'h3');
$loginPage->login('admin', 'admin');

$I->amGoingTo('try to view and create pages');
$I->amOnPage('/user/admin/create');
#$preview = uniqid('preview-');
$preview = 'preview';
$I->fillField('#user-email', $preview.'@example.com');
$I->fillField('#user-username', $preview);
$I->fillField('#user-password', 'preview1234');
$I->click('Save');
$I->wait(3);
$I->seeInPageSource('Update user account');
$I->makeScreenshot('success-preview-user');


$I->amGoingTo('assign permission to preview user');
$I->click('Assignments');
$I->wait(2);
$I->click('.select2-selection__rendered');
$I->wait(2);
$I->click('[id$="-app_site"]');
$I->click('.select2-selection__rendered');
$I->click('[id$="-pages_default_page"]');
$I->wait(1);
$I->makeScreenshot('success-preview-items');
$I->click('Update assignments');
$I->wait(2);
$I->makeScreenshot('success-preview-items-update');

