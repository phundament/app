<?php
$I = new WebGuy($scenario);
$I->wantTo('change password');

// Login

$I->amOnPage('?r=/');
$I->click('Login');
$I->fillField('UserLogin[username]', 'editor');
$I->fillField('UserLogin[password]','editor');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');

// Change Password

$I->click('Change password');
$I->see('Change password');
$I->fillField('UserChangePassword[oldPassword]', 'editor');
$I->fillField('UserChangePassword[password]','editor');
$I->fillField('UserChangePassword[verifyPassword]','editor');
$I->click('.form INPUT[type=submit]');
$I->see('Your profile');
$I->see('New password is saved.');