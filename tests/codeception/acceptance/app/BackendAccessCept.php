<?php

// @group mandatory

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure backend access works');

$I->amOnPage('/backend');
$I->dontSeeElement('.small-box');
$I->amOnPage('/prototype/html');
$I->dontSee('Htmls', 'h1');
$I->amOnPage('/prototype/less');
$I->dontSee('Lesses', 'h1');
$I->amOnPage('/settings');
$I->dontSee('Settings', 'h1');

$loginPage = LoginPage::openBy($I);
$loginPage->login('admin', 'admin');

$I->amOnPage('/backend');
$I->seeElement('.small-box');
$I->amOnPage('/prototype/html');
$I->see('Htmls', 'h1');
$I->amOnPage('/prototype/less');
$I->see('Lesses', 'h1');
$I->amOnPage('/settings');
$I->see('Settings', 'h1');
