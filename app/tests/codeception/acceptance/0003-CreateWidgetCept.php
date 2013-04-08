<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget');
$I->amOnPage('?r=user/login');
$I->fillField('UserLogin[username]', 'editor');
$I->fillField('UserLogin[password]','editor');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->dontSee('Login');

$I->amOnPage('index.php');
$I->click('Create Widget');
$I->see('P3 Widget Create');
$I->click('Save');
$I->see('Translation for');
