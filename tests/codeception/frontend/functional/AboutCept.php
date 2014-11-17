<?php
use tests\codeception\frontend\FunctionalTester;
use tests\codeception\frontend\_pages\DocsPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that "Docs" works');
DocsPage::openBy($I);
$I->see('About', 'h1');
