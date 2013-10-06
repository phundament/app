<?php
$I = new WebGuy($scenario);
$I->wantTo('create a media file');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=p3media&lang=en');

$I->click(' Create File');
$I->see('Media Create','h1');
$I->fillField('P3Media[title]','file');
$I->attachFile('fileUpload','phundament.png');
$I->click('Save');
$I->see('file','h5');