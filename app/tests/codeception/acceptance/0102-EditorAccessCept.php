<?php
$I = new WebGuy($scenario);
$I->wantTo('log in and check access rights for editors');

$I->amOnPage('?r=user/login');
$I->fillField('UserLogin[username]', 'editor');
$I->fillField('UserLogin[password]','editor');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->dontSee('Login');
$I->see('Logout');

$I->amOnPage('index.php?r=user/admin/admin');
$I->see('403');
$I->amOnPage('index.php?r=rights');
$I->see('403');
$I->amOnPage('index.php?r=p3admin');
$I->see('Application');
$I->amOnPage('index.php?r=p3widgets');