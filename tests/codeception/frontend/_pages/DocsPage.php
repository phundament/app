<?php

namespace tests\codeception\app\_pages;

use yii\codeception\BasePage;

/**
 * Represents about page
 * @property \codeception_app\AcceptanceTester|\codeception_app\FunctionalTester $actor
 */
class DocsPage extends BasePage
{
    public $route = 'site/docs';
}
