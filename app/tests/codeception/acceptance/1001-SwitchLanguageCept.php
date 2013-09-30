<?php
$I = new WebGuy($scenario);
$I->wantTo('switch language');

// Switch language to german

$I->amOnPage('?r=site/index&lang=en');
$I->see('en','.dropdown-toggle');
$I->click('Deutsch','#frontend-navbar');
$I->see('de','.dropdown-toggle');