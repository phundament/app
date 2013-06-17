<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=p3widgets/p3Widget/admin&lang=en');

$I->click(' Create','.btn');
$I->see('Create','h1');
$I->selectOption('P3Widget[alias]','Basic HTML Widget');
$I->fillField('P3Widget[controllerId]','site');
$I->fillField('P3Widget[containerId]','top');
$I->fillField('P3Widget[actionName]','index');
$I->click('Save');
$I->see('Widgets','h1');
$I->see('Data','h2');