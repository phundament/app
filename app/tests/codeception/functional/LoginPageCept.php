<?php
$I = new TestGuy($scenario);
$I->wantTo('login and logout');
$I->amOnPage('?r=/');
$I->click('Login');
$I->see('Login','h1');

Codeception\Module\TestHelper::login($I, 'admin', 'admin');

$I->click('Logout');
$I->see('Login', 'ul.nav');

$I->dontSee('Settings');
