<?php

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that access control UI works');

$I->amOnPage('/');
$I->dontSeeLink('/de/backend', '.nav');

LoginPage::openBy($I)->login('admin', 'admin');

$I->see('','.glyphicon.glyphicon-cog');
