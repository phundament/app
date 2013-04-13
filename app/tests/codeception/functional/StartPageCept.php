<?php
$I = new TestGuy($scenario);
$I->wantTo('see the home page');
$I->amOnPage('?r=/');
$I->see('Phundament');