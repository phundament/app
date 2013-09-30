<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for editor');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=user/admin/admin&lang=en');
$I->see('403','h2');
$I->amOnPage('?r=rights&lang=en');
$I->see('403','h2');
$I->amOnPage('?r=p3admin/default/overview&lang=en');
$I->see('403','h2');

// Links Sidebar
$I->click('Upload','#backend-navbar');
$I->see('Upload Session','h1');
$I->click('Browse','#backend-navbar');
$I->see('Browser','h1');
$I->click('Sitemap','#backend-navbar');
$I->see('Pages','h1');

$I->click('Manage','#content');
$I->see('Manage', 'h1 small');

$I->click('Registry','#backend-sidebar');
$I->see('Widgets','h1');
$I->click('Dashboard','#backend-sidebar');
$I->see('Application','h1');

// Links User Menu
$I->click('Profile','#backend-navbar');
$I->see('Your profile','h1');
$I->click('List','#backend-navbar');
$I->see('List User','h1');