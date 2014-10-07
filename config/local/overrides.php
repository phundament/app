<?php
/**
 * Overrides the main application config - used when running the code locally
 */

namespace neam\bootstrap;

// ==== Yii core config ====

Config::expect("YII_DEBUG", true);
Config::expect("YII_ENV", 'dev');

// ==== Identity-related config ====

Config::expect("APP_NAME", '[local] Phundament 4');
Config::expect("ADMIN_EMAIL", 'admin+local@h17n.de');
Config::expect("SUPPORT_EMAIL", 'support+local@h17n.de');

// ==== Infrastructure-related config ====

// Don't require the _URL constant locally

Config::expect("DATABASE_URL", null);
