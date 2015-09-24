<?php

use tests\codeception\_pages\AboutPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that docs works');
AboutPage::openBy($I);
$I->see('About', 'h1');
