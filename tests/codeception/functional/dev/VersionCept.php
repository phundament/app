<?php

$I = new FunctionalTester($scenario);

$I->amGoingTo('check version visiblity');

$I->seeFileFound('/app/version');
$I->dontSeeFileFound('/app/src/version');
$version = file_get_contents('/app/version');

$I->expectTo('see application version '.$version);
$I->amOnPage('/en');
$I->see($version);
