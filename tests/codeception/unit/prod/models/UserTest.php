<?php

namespace tests\codeception\unit\models;

use yii\codeception\TestCase;

class UserTest extends TestCase
{

    public $appConfig = '@tests/codeception/_config/unit.php';

    protected function setUp()
    {
        parent::setUp();
        // uncomment the following to load fixtures for user table
        //$this->loadFixtures(['user']);
    }

    // TODO add test methods here
}
