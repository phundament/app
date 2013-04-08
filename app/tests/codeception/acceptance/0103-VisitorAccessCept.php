<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for visitors');

$I->amOnPage('?r=user/admin/admin');
$I->see('Login');
$I->amOnPage('?r=rights');
$I->see('Login');
$I->amOnPage('?r=p3admin');
$I->see('Login');

$I->amOnPage('index.php');
$I->see('Login');
$I->amOnPage('?r=user/login');
$I->see('Login');
$I->see('Register');
$I->see('Lost Password?');
$I->click('Lost Password?');
$I->see('Restore');
$I->amOnPage('?r=user/login');
$I->click('Register');
$I->see('Registration');