<?php
$I = new TestGuy($scenario);
$I->wantTo('see the login page');
$I->amOnPage('?r=user/login');
$I->see('Login');