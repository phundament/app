<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget');

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

$I->amOnPage('?r=p3widgets/p3Widget/admin&lang=en');

$I->click('Create');
$I->selectOption('P3Widget[alias]','Basic HTML Widget');
$I->fillField('P3Widget[containerId]','top');
$I->see('P3 Widget Create');
$I->click('Save');
$I->see('P3 Widget');
$I->see('Relations');
