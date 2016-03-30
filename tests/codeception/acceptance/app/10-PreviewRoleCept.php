<?php

// @group mandatory

use tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('create a preview RBAC role');

$loginPage = LoginPage::openBy($I);

$I->amGoingTo('try to login as admin');
$loginPage->login('admin', 'admin');

$I->amGoingTo('try to view and create pages');
$I->amOnPage('/rbac/role/create');


$I->fillField('#role-name', 'Preview');
$I->fillField('#role-description', 'Preview Role');

$I->click('Save');

$I->wait(2);


$I->see('Preview Role', 'td');