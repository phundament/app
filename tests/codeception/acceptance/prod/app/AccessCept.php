<?php

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure backend access works');

$I->amOnPage('/cms/html');
$I->dontSee('Htmls', 'h1');
$I->makeScreenshot('access-cms-html');

$loginPage = LoginPage::openBy($I);
$loginPage->login('admin', 'admin');

$I->amOnPage('/cms/html');
$I->see('Htmls', 'h1');
