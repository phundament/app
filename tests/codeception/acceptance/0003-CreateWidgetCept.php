<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=p3widgets/p3Widget/admin&lang=en');

$I->click('Create', '#content');
$I->see('Create','h1');
$I->selectOption('P3Widget[alias]','Basic HTML Widget');
$I->fillField('P3Widget[controller_id]','site');
$I->fillField('P3Widget[container_id]','top');
$I->fillField('P3Widget[action_name]','index');
$I->click('Save', '.form-actions');
$I->see('Data','h2');