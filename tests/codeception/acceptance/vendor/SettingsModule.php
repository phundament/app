<?php

// @group mandatory

use \tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);

$I->amOnPage('/settings');
$I->dontSee('Settings', 'h1');

$loginPage = LoginPage::openBy($I);
$loginPage->login('admin', 'admin');

$I->amOnPage('/settings');
$I->see('Settings', 'h1');