<?php
/**
 * Overrides the main application config - used when running the code locally
 */

namespace neam\bootstrap;

// ==== Yii core config ====

Config::expect("YII_DEBUG", $default = true, $required = false);
Config::expect("YII_ENV", $default = 'dev', $required = false);

// ==== Identity-related config ====

Config::expect("APP_NAME", $default = '[local] Phundament 4', $required = false);
Config::expect("ADMIN_EMAIL", $default = 'admin+local@h17n.de', $required = false);
Config::expect("SUPPORT_EMAIL", $default = 'support+local@h17n.de', $required = false);

// ==== Infrastructure-related config ====

// Don't require the _URL constant locally

Config::expect("DATABASE_URL", $default = null, $required = false);
