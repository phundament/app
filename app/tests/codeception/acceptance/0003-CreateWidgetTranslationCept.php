<?php
$I = new WebGuy($scenario);
$I->wantTo('create a widget translation');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=site/index&lang=en');
$I->See('Translation for','.alert');

$I->click(' Manage','.dropdown-menu li a');
$I->see('Widgets','h1');
$I->click('Widget Translations','a');
$I->see('Translations','h1');
$I->click(' Create','.btn');
$I->fillField('P3WidgetTranslation[language]','en');
$I->click('Save');

$I->amOnPage('?r=site/index&lang=en');
$I->dontSee('Translation for','.alert');