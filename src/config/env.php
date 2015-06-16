<?php

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../..');
$dotenv->load();

$dotenv->required('YII_DEBUG', ["", "0", "1", "true", true]);
$dotenv->required('YII_ENV', ['dev', 'prod', 'test']);
$dotenv->required(['YII_TRACE_LEVEL']);
$dotenv->required(['APP_NAME', 'APP_SUPPORT_EMAIL', 'APP_ADMIN_EMAIL']);
$dotenv->required(['DATABASE_DSN', 'DATABASE_USER', 'DATABASE_PASSWORD']);

defined('APP_VERSION') or define('APP_VERSION', file_get_contents(__DIR__ . '/../../version'));
