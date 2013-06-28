<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for editor');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=user/admin/admin&lang=en');
$I->see('403','h2');
$I->amOnPage('?r=rights&lang=en');
$I->see('403','h2');
$I->amOnPage('?r=p3admin/default/settings&lang=en');
$I->see('403','h2');

// Links Content Menu

$I->click(' Upload','.dropdown-menu li a');
$I->see('Upload Session','h1');
$I->click(' Browse','.dropdown-menu li a');
$I->see('Browser','h1');
$I->click(' Sitemap','.dropdown-menu li a');
$I->see('Pages','h1');

// TODO: fix me
//$I->click('Manage','#content .btn');
//$I->see('Manage', 'h1 small');

$I->click(' Manage','.dropdown-menu li a');
$I->see('Widgets','h1');
$I->click(' Overview','.dropdown-menu li a');
$I->see('Application','h1');

// Links User Menu

$I->click(' Profile','.dropdown-menu li a');
$I->see('Your profile','h1');
$I->click(' List','.dropdown-menu li a');
$I->see('List User','h1');