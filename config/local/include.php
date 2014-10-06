<?php
// Expect the "paas" config as base

require(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'paas' . DIRECTORY_SEPARATOR . 'include.php');

// Add local overrides

require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'overrides.php');

// Include the secrets file containing non-versioned secrets

require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'secrets.php');
