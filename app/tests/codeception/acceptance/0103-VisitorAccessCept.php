<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for visitor');

$I->amOnPage('?r=user/admin/admin&lang=en');
$I->see('Login','h1');
$I->amOnPage('?r=rights&lang=en');
$I->see('Login','h1');
$I->amOnPage('?r=p3admin/default/overview&lang=en');
$I->see('Login','h1');
$I->amOnPage('?r=p3admin/default/index&lang=en'); // Dashboard
$I->see('Login','h1');

$I->amOnPage('?r=user/login/login&lang=en');
$I->see('Login','h1');
$I->see('Register','a');
$I->see('Lost Password?','#content');
$I->click('Lost Password?','#content');
$I->see('Restore');

$I->amOnPage('?r=user/login/login&lang=en');
$I->click('Register');
$I->see('Registration');