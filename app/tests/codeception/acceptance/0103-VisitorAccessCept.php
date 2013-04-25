<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for visitor');

$I->amOnPage('?r=user/admin/admin&lang=en');
$I->see('Login','h1');
$I->amOnPage('?r=rights&lang=en');
$I->see('Login','h1');
$I->amOnPage('?r=p3admin/default/settings&lang=en');
$I->see('Login','h1');

$I->amOnPage('?r=site/index&lang=en');
$I->see('Login','h1');
$I->amOnPage('?r=user/login/login&lang=en');
$I->see('Login','h1');
$I->see('Register','a');
$I->see('Lost Password?','a');
$I->click('Lost Password?','a');
$I->see('Restore');

$I->amOnPage('?r=user/login/login&lang=en');
$I->click('Register');
$I->see('Registration');