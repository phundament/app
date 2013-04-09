<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget');

// Login
Codeception\Module\WebHelper::login($I, 'admin', 'admin');


$I->amOnPage('index.php');
$I->click('Create Widget');
$I->see('P3 Widget Create');
$I->click('Save');
$I->see('Translation for');
