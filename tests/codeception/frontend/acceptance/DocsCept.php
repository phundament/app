<?php
use tests\codeception\frontend\AcceptanceTester;
use tests\codeception\frontend\_pages\DocsPage;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that about works');
DocsPage::openBy($I);
$I->see('About', 'h1');
