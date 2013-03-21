<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in');
$I->amOnPage('index.php/en/site/login');
$I->fillField('UserLogin[username]', 'admin');
$I->fillField('UserLogin[password]','admin');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->dontSee('Login');