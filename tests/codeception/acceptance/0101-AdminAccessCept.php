<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for admin');

// Login

Codeception\Module\WebHelper::login($I, 'admin', 'admin');
$I->amOnPage('?r=site/index&lang=en');

// Links Content Menu

$I->click('Upload');
$I->see('Upload Session', 'H1');
$I->click('Browse');
$I->see('Browser', 'H1');
$I->click('Sitemap');
$I->see('Pages', 'H1');
$I->click('Manage');
$I->see('Pages', 'H1');
$I->click('Registry');
$I->see('Widgets', 'H1');
$I->click('Overview');
$I->see('Application', 'H1');
$I->click('Dashboard');
$I->see('Application', 'H1');
$I->click('Dictionaries');
$I->see('Manage');
$I->click('Translate Missing');
$I->see('Missing Translations');

// Links Application Menu

$I->click('Accounts');
$I->see('Manage Users');
$I->click('Assignments');
$I->see('Assignments');
$I->click('Overview');
$I->see('Application');

// Links User Menu

$I->click('Profile');
$I->see('Your profile');
$I->click('List');
$I->see('List User');


