<?php
use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that Pages works');

$loginPage = LoginPage::openBy($I);

$I->see('Sign in', 'h3');

$I->amGoingTo('try to login with correct credentials');
$loginPage->login('admin', 'admin');
$I->amGoingTo('try to view and create pages');
$I->amOnPage('/pages');

$I->see('Pages-Module', '.kv-heading-container');
$I->makeScreenshot('success-pages-index');

#$I->click('#w0-tree > ul > li:nth-child(1) > ul > li:nth-child(1) > div > div.kv-node-detail > span.kv-node-label');
#$I->wait(3); // only for selenium
#$I->makeScreenshot('success-pages-click');
#$I->see('Ihre Funktion');