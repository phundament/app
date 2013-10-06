<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in and sign out');

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

$I->see('Logout','#backend-navbar .dropdown-menu li a');
$I->see('admin', '#backend-navbar');
$I->dontSee('Login','#backend-navbar');

$I->click('Logout', '#backend-navbar');
$I->see('Login');
$I->dontSee('Settings','#backend-navbar');