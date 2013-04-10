<?php
$I = new WebGuy($scenario);
$I->wantTo('sign in');

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

$I->click('Logout');
$I->see('Login');
$I->dontSee('Settings');