<?php

$I = new AcceptanceTester($scenario);

$I->amGoingTo('check javascript with a modal');
$I->amOnPage('/en-us');

$I->dontSee('#infoModal');
$I->click('footer .pull-left a');
$I->waitForElementVisible('#infoModal',3);
$I->seeElement('#infoModal');