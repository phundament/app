<?php

namespace tests\codeception\app\unit;

/**
 * @inheritdoc
 */
class DbTestCase extends \yii\codeception\DbTestCase
{
    public $appConfig = '@tests/codeception/config/frontend/unit.php';
}
