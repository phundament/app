<?php
$I = new WebGuy($scenario);
$I->wantTo('switch language');

// Login

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

// Switch language to german

$I->amOnPage('?r=user/profile&lang=en');
$I->see('Your Profile');
$I->click('Deutsch');
$I->see('Ihr Profil');

// Switch language back to english

$I->click('English');
$I->see('Your profile');