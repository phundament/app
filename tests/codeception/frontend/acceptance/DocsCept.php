<?php
use tests\codeception\app\AcceptanceTester;
use tests\codeception\app\_pages\DocsPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that about works');
DocsPage::openBy($I);
$I->see('About', 'h1');
