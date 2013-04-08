<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for visitors');

$I->amOnPage('index.php?r=user/admin/admin');
$I->see('Login');
$I->amOnPage('index.php?r=rights');
$I->see('Login');
$I->amOnPage('index.php?r=p3admin');
$I->see('Login');

$I->amOnPage('index.php');
$I->see('Login');
$I->amOnPage('index.php?r=user/login');
$I->see('Login');
$I->see('Register');
$I->see('Lost Password?');
$I->click('Lost Password?');
$I->see('Restore');
$I->amOnPage('index.php?r=user/login');
$I->click('Register');
$I->see('Registration');