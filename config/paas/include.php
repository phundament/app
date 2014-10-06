<?php
/**
 * The main application config
 */

namespace neam\bootstrap;

// ==== Yii core config ====

Config::expect("YII_DEBUG", $default = false, $required = false);
Config::expect("YII_ENV", $default = 'paas', $required = false);

// ==== Identity-related config ====

Config::expect("APP_NAME", $default = '[paas] Phundament 4', $required = false);
Config::expect("ADMIN_EMAIL", $default = 'admin+paas@h17n.de', $required = false);
Config::expect("SUPPORT_EMAIL", $default = 'support+paas@h17n.de', $required = false);

// ==== Infrastructure-related config ====

// Activate support for special configuration directives since we need it below
$_ENV["EXPAND_CONFIG_URLS"] = "1";

// Support setting main db constants based on DATABASE_URL environment variable
Config::expect("DATABASE_URL", $default = null, $required = false);

// Database table prefix
Config::expect("DATABASE_TABLE_PREFIX", $default = null, $required = false);
