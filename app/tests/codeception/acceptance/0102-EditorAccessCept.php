<?php
$I = new WebGuy($scenario);
$I->wantTo('check access rights for editor');

Codeception\Module\WebHelper::login($I, 'editor', 'editor');

$I->amOnPage('?r=user/admin/admin&lang=en');
$I->see('403');
$I->amOnPage('?r=rights&lang=en');
$I->see('403');
$I->amOnPage('?r=p3admin/default/settings&lang=en');
$I->see('Application');