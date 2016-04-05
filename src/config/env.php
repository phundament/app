<?php

$dotenv = new Dotenv\Dotenv(__DIR__.'/../..');
$dotenv->load();

$dotenv->required('YII_DEBUG', ['', '0', '1', 'true', true]);
$dotenv->required('YII_ENV', ['dev', 'prod', 'test']);
$dotenv->required(['YII_TRACE_LEVEL']);
$dotenv->required(['APP_NAME', 'APP_ADMIN_EMAIL']);
$dotenv->required(['APP_LANGUAGES']);
$dotenv->required(['DATABASE_DSN', 'DATABASE_USER', 'DATABASE_PASSWORD']);

if (!preg_match('/^[a-z0-9_-]{3,16}$/', getenv('APP_NAME'))) {
    throw new \Dotenv\Exception\ValidationException(
        'APP_NAME must only be lowercase, dash or underscore and 3-16 characters long.'
    );
}

if (is_file(__DIR__.'/../version')) {
    $version = file_get_contents(__DIR__.'/../version');
} else {
    $version = 'dev';
}

defined('APP_VERSION') or define('APP_VERSION', $version);
