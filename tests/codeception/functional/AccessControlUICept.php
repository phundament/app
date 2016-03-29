<?php

// @group mandatory

use tests\codeception\_pages\LoginPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that access control UI works');

$I->amOnPage('/');
$I->dontSeeLink('/de/backend', '.nav');
$I->dontSee('','.glyphicon.glyphicon-cog');

LoginPage::openBy($I)->login('admin', 'admin');

$I->see('','.glyphicon.glyphicon-cog');
