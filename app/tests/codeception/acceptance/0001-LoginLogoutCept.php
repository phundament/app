<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in');

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

$I->click(' Logout','.dropdown-menu li a');
$I->see('Login','.nav li a');
$I->dontSee('Settings','.dropdown-menu li a');