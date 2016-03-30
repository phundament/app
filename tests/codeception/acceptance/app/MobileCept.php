<?php

// @group mandatory

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that responsive mobile layout works');

$I->resizeWindow(320, 568);
$I->amOnPage('/');
$I->makeScreenshot('mobile');

$I->click('button.navbar-toggle');
$I->wait(3);

$I->seeElement('li.active');
$I->seeLink('Login');
$I->makeScreenshot('mobile-open-menu');
