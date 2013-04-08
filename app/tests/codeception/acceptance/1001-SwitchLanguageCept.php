<?php
$I = new WebGuy($scenario);
$I->wantTo('switch language');

// Login

$I->amOnPage('index.php?r=user/login');
$I->fillField('UserLogin[username]', 'editor');
$I->fillField('UserLogin[password]','editor');
$I->click('.form INPUT[type=submit]');

// Switch language to german

$I->see('Your Profile');
$I->click('Deutsch');
$I->see('Ihr Profil');

// Switch language back to english

$I->click('English');
$I->see('Your profile');