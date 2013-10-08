<?php
$I = new WebGuy($scenario);
$I->wantTo('create a media file');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=p3media&lang=en');

$I->click(' Create File');
$I->see('Media Create','h1');
$I->fillField('P3Media[default_title]','file-12345');
$I->attachFile('fileUpload','phundament.png');
$I->click('Save','FORM');
$I->see('file-12345','h5');