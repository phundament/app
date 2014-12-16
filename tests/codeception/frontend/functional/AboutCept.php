<?php
use tests\codeception\app\FunctionalTester;
use tests\codeception\app\_pages\DocsPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that "Docs" works');
DocsPage::openBy($I);
$I->see('About', 'h1');
