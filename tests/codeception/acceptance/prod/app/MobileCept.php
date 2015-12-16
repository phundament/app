<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2015 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that responsive mobile layout works');

$I->resizeWindow(320, 568);
$I->amOnPage('/');
$I->makeScreenshot('mobile');

$I->click('button.navbar-toggle');
$I->wait(3);

$I->seeElement('li.active');
$I->seeLink('Login');
$I->makeScreenshot('mobile-open-menu');
