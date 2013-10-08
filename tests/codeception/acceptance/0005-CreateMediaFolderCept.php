<?php
$I = new WebGuy($scenario);
$I->wantTo('create a media folder');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=p3media&lang=en');

$I->click(' Create Folder');
$I->see('Media Create');
$I->fillField('P3Media[default_title]','folder');
$I->click('Save','FORM');
$I->see('folder','div ul li');