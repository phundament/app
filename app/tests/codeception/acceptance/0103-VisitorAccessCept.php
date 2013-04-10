<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for visitor');

$I->amOnPage('?r=user/admin/admin&lang=en');
$I->see('Login');
$I->amOnPage('?r=rights&lang=en');
$I->see('Login');
$I->amOnPage('?r=p3admin/default/settings&lang=en');
$I->see('Login');

$I->amOnPage('?r=site/index&lang=en');
$I->see('Login');
$I->amOnPage('?r=user/login/login&lang=en');
$I->see('Login');
$I->see('Register');
$I->see('Lost Password?');
$I->click('Lost Password?');
$I->see('Restore');
$I->amOnPage('?r=user/login/login&lang=en');
$I->click('Register');
$I->see('Registration');