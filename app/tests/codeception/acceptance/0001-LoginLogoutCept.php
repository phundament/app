<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in');

// Login

$I->amOnPage('index.php?r=user/login');
$I->fillField('UserLogin[username]', 'admin');
$I->fillField('UserLogin[password]','admin');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->see('Logout');
$I->dontSee('Login');

// Logout

$I->click('Logout');
$I->see('Login');
$I->dontSee('Settings');