<?php

namespace tests\codeception\frontend\_pages;

use yii\codeception\BasePage;

/**
 * Represents about page
 * @property \codeception_frontend\AcceptanceTester|\codeception_frontend\FunctionalTester $actor
 */
class DocsPage extends BasePage
{
    public $route = 'site/docs';
}
