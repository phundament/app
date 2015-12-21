<?php

$I = new FunctionalTester($scenario);

$I->wantTo('check application versioning');

$I->dontSeeFileFound('/app/src/version');
$I->seeFileFound('/app/version');
$I->openFile('/app/version');
$I->dontSeeInThisFile('dev');
$I->dontSeeInThisFile('dirty');

$version = file_get_contents('/app/version');

$I->amGoingTo('check version visiblity in modal');
$I->expectTo('see application version '.$version);
$I->amOnPage('/user/security/login');
$I->see($version, '.modal-body');
