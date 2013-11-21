<?php
$I = new WebGuy($scenario);
$I->wantTo('create a page');

Codeception\Module\WebHelper::login($I, 'admin', 'admin');

$I->amOnPage('?r=site/index&lang=en');
$I->click('Sitemap');
$I->see('Pages');
$I->click('Create');
$I->see('Page');
$I->fillField('P3Page[default_menu_name]','First');
$I->fillField('P3Page[status]','published');
$I->fillField('P3Page[layout]','//layouts/main');
$I->fillField('P3Page[view]','//p3pages/column1');
$I->click('Save');

$I->see('View','#content');
$I->see('Data','#content');
#$I->see('Relations','#content');
#$I->see('First','#content table');