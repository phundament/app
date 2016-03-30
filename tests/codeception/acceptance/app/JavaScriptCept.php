<?php

// @group mandatory

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that JavaScript works');

$I->amGoingTo('check javascript with a modal');

$I->amOnPage('/en-us');
$I->dontSee('#infoModal');

$I->click('footer .pull-left a');
$I->waitForElementVisible('#infoModal',3);
$I->seeElement('#infoModal');
$I->makeScreenshot('modal');

$I->click('#infoModal .close');
$I->dontSee('#infoModal');
