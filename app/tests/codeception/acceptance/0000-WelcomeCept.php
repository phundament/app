<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure that frontpage works');
$I->amOnPage('?r=site/index&lang=en');
$I->see('Phundament');