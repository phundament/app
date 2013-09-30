<?php
$I = new WebGuy($scenario);
$I->wantTo('change password');

// Login

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

// Change Password

$I->amOnPage('?r=user/profile&lang=en');
$I->click('Change password','#sidebar');
$I->see('Change password','#content h1');
$I->fillField('UserChangePassword[oldPassword]', 'editor');
$I->fillField('UserChangePassword[password]','editor');
$I->fillField('UserChangePassword[verifyPassword]','editor');
$I->click('.form INPUT[type=submit]');
$I->see('Your profile');
$I->see('New password is saved.');