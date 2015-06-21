<?php

use tests\codeception\_pages\AboutPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that sign-up works');
$I->amOnPage('/user/register');
$I->see('Sign up');
