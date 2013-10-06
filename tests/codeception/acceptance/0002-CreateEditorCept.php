<?php
$I = new WebGuy($scenario);
$I->wantTo('create an editor');

// Login

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

// Create Editor

$I->amOnPage('?r=site/index&lang=en');
$I->click('Accounts');
$I->see('Manage Users');
$I->click('Create User');
$I->see('Create User');
$I->fillField('User[username]', 'editor');
$I->fillField('User[password]','editor');
$I->fillField('User[email]', 'editor@testtesttest.de');
$I->selectOption('Superuser','No');
$I->selectOption('Status','Active');
$I->fillField('Profile[first_name]', 'editor');
$I->fillField('Profile[last_name]', 'editor');
$I->click('.form INPUT[type=submit]');
$I->see('View User "editor"');

// Assign editor rights

$I->click('Assignments');
$I->see('Assignments');
$I->click('editor');
$I->selectOption('AssignmentForm[itemname]','Content Editor (Widgets, Media Files)');
$I->click('.form INPUT[type=submit]');
$I->see('Content Editor (Widgets, Media Files)');
$I->see('Revoke');