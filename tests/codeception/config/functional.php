<?php
$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;

#var_dump($_SERVER);exit;

/**
 * Application configuration for functional tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/main.php'),
    require(__DIR__ . '/config.php'),
    [
        'controllerNamespace' => 'app\controllers',
        'components' => [
            'request' => [
                // it's not recommended to run functional tests with CSRF validation enabled
                'enableCsrfValidation' => false,
                // but if you absolutely need it set cookie domain to localhost
                /*
                'csrfCookie' => [
                    'domain' => 'localhost',
                ],
                */
            ],
        ],
    ]
);
