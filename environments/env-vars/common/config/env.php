<?php
/**
 * The main application config
 */

namespace neam\bootstrap;

// ==== Yii core config ====

Config::expect("YII_DEBUG", false);
Config::expect("YII_ENV", 'paas');

// ==== Identity-related config ====

Config::expect("APP_NAME", '[paas] Phundament 4');
Config::expect("SUPPORT_EMAIL", 'support+paas@h17n.de');

// ==== Admin user details ====

Config::expect("ADMIN_EMAIL", 'admin+paas@h17n.de');

// ==== Infrastructure-related config ====

// Activate support for special configuration directives since we need it below
$_ENV["EXPAND_CONFIG_URLS"] = "1";

// Support setting main db constants based on DATABASE_URL environment variable
Config::expect("DATABASE_URL", null);
#Config::expect("DATABASE_HOST", 'localhost', true);

// Database table prefix
Config::expect("DATABASE_TABLE_PREFIX", null);

// Test database configuration is only used when running tests, thus is only required then
Config::expect("TEST_DB_SCHEME", null, Config::read("YII_ENV") == 'test');
Config::expect("TEST_DB_HOST", null, Config::read("YII_ENV") == 'test');
Config::expect("TEST_DB_PORT", null, Config::read("YII_ENV") == 'test');
Config::expect("TEST_DB_USER", null, Config::read("YII_ENV") == 'test');
Config::expect("TEST_DB_PASSWORD", null, Config::read("YII_ENV") == 'test');
Config::expect("TEST_DB_NAME", null, Config::read("YII_ENV") == 'test');
Config::expect("TEST_DB_TABLE_PREFIX", null, Config::read("YII_ENV") == 'test');

// Require setting smtp constants based on SMTP_URL environment variable
Config::expect("SMTP_URL", null, true); // smtp://username:password@host:587?encryption=tls

Config::defineConstants();