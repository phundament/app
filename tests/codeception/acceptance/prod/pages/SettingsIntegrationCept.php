<?php

/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \tests\codeception\_pages\LoginPage;

$I = new AcceptanceTester($scenario);

$I->amOnPage('/settings');
$I->dontSee('Settings', 'h1');

$loginPage = LoginPage::openBy($I);
$loginPage->login('admin', 'admin');

$I->amOnPage('/settings');
$I->see('Settings', 'h1');