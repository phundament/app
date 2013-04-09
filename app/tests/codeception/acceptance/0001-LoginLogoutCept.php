<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in');

// Login
Codeception\Module\WebHelper::login($I, 'admin', 'admin');

// Logout
$I->click('Logout');
$I->see('Login');
$I->dontSee('Settings');