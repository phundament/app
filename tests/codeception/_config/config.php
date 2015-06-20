<?php
/**
 * Application configuration shared by all test types
 */
return [
    'components' => [
        'mailer' => [
            'useFileTransport' => true,
        ],
        'request' => [
           'cookieValidationKey' => getenv('APP_COOKIE_VALIDATION_KEY')
        ],
    ],
];
