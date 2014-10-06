<?php

// Database credentials

$_ENV["DATABASE_SCHEME"] = "mysql";
$_ENV["DATABASE_HOST"] = "localhost";
$_ENV["DATABASE_PORT"] = "3306";
$_ENV["DATABASE_USER"] = "dev";
$_ENV["DATABASE_PASSWORD"] = "dev123";
$_ENV["DATABASE_NAME"] = "p4";
$_ENV["DATABASE_TABLE_PREFIX"] = "";

// Test database configuration is only used when running locally

$_ENV["TEST_DB_SCHEME"] = $_ENV["DATABASE_SCHEME"];
$_ENV["TEST_DB_HOST"] = $_ENV["DATABASE_HOST"];
$_ENV["TEST_DB_PORT"] = $_ENV["DATABASE_PORT"];
$_ENV["TEST_DB_USER"] = $_ENV["DATABASE_USER"];
$_ENV["TEST_DB_PASSWORD"] = $_ENV["DATABASE_PASSWORD"];
$_ENV["TEST_DB_NAME"] = $_ENV["DATABASE_NAME"] . "_test";
$_ENV["TEST_DB_TABLE_PREFIX"] = $_ENV["DATABASE_TABLE_PREFIX"];
