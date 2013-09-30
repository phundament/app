<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in and sign out');

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

$I->see('Logout','#frontend-navbar .dropdown-menu li a');
$I->see('admin', '#frontend-navbar');
$I->dontSee('Login','#frontend-navbar .nav li a');

$I->click('Logout', '#frontend-navbar');
$I->see('Login','#frontend-navbar .nav li a');
$I->dontSee('Settings','.dropdown-menu li a');