<?php
$I = new WebGuy($scenario);
$I->wantTo('create page');
$I->amOnPage('?r=user/login');
$I->fillField('UserLogin[username]', 'editor');
$I->fillField('UserLogin[password]','editor');
$I->click('.form INPUT[type=submit]');
$I->see('Your Profile');
$I->dontSee('Login');

$I->amOnPage('index.php');
$I->click('Sitemap');
$I->see('Pages');
$I->click('Sitemap');
$I->click('Create');
$I->see('P3 Page');
$I->see('Sitemap');
$I->fillField('P3Page[layout]','//layouts/main');
$I->fillField('P3Page[view]','//p3pages/column1');
$I->click('.form INPUT[type=submit]');
$I->see('Data');
$I->see('Properties');
$I->see('Relations');