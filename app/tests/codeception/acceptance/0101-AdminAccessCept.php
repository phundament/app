<?php
$I = new WebGuy($scenario);
$I->wantTo('log in and check access rights for admin');

// Login

$I->amOnPage('index.php');
$I->click('Login');
$I->fillField('UserLogin[username]', 'admin');
$I->fillField('UserLogin[password]','admin');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->dontSee('Login');
$I->see('Logout');

// Links Content Menu

$I->click('Upload');
$I->see('Upload Session');
$I->click('Browse');
$I->see('Browser');
$I->click('Sitemap');
$I->see('Pages');
$I->click('Manage');
$I->see('P3 Pages');
$I->click('Manage');
$I->see('Widgets');
$I->click('Overview');
$I->see('Application');

// Links Application Menu

$I->click('Users');
$I->see('Manage Users');
$I->click('Rights');
$I->see('Assignments');
$I->click('Settings');
$I->see('Application');

// Links User Menu

$I->click('Profile');
$I->see('Your profile');
$I->click('List');
$I->see('List User');
$I->click('Settings');
$I->see('Application');