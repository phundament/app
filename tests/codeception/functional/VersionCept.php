<?php

// @group mandatory

$I = new FunctionalTester($scenario);

$I->wantTo('check application versioning');

$I->dontSeeFileFound('version');
$I->seeFileFound('src/version');
$I->openFile('src/version');
$I->dontSeeInThisFile('dev');
$I->dontSeeInThisFile('dirty');

$version = file_get_contents('src/version');

$I->amGoingTo('check version visiblity in modal');
$I->expectTo('see application version '.$version);
$I->amOnPage('/user/security/login');
$I->see($version, '.modal-body');
