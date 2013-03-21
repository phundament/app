<?php
$I = new WebGuy($scenario);
$I->wantTo('create and remove a widget');
$I->amOnPage('index.php?r=user/login');
$I->fillField('UserLogin[username]', 'admin');
$I->fillField('UserLogin[password]','admin');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->dontSee('Login');

$I->amOnPage('index.php');
$I->click('Create Widget');
$I->see('P3 Widget Create');
$I->click('Save');
$I->see('Translation for');
