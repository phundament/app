<?php

// @group mandatory

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that error page works');

$I->amOnPage('/_this_page_does_not_exist_');
$I->seeResponseCodeIs(404);
$I->see('Not Found');
