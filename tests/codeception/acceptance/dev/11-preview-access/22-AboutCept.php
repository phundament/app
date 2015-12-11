<?php

use tests\codeception\_pages\AboutPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that about works');

$loginPage = \tests\codeception\_pages\LoginPage::openBy($I);
$I->amGoingTo('try to login as preview');
$loginPage->login('preview', 'preview1234');


$I->amOnPage('/impressum-358');
$I->see('Impressum', 'h1');
