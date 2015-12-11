<?php

$I = new FunctionalTester($scenario);

$I->amGoingTo('check version visiblity');

$I->seeFileFound('/app/version');
$version = file_get_contents('/app/version');

$I->expectTo('see application version '.$version);
$I->amOnPage('/en-us');
$I->see($version);
