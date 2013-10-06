<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for admin');

// Login

Codeception\Module\WebHelper::login($I, 'admin', 'admin');
$I->amOnPage('?r=site/index&lang=en');

// Links Content Menu

$I->click('Upload');
$I->see('Upload Session');
$I->click('Browse');
$I->see('Browser');
$I->click('Sitemap');
$I->see('Pages');
$I->click('Manage');
$I->see('Pages');
$I->click('Registry');
$I->see('Widgets');
$I->click('Overview');
$I->see('Application');
$I->click('Dashboard');
$I->see('Application');

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
