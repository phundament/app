<?php

use \Dotenv;

Dotenv::load(__DIR__.'/../..');

Dotenv::required('YII_DEBUG',["","0","1","true"]);
Dotenv::required('YII_ENV',['dev','env','prod']);
Dotenv::required(['APP_NAME','SUPPORT_EMAIL','ADMIN_EMAIL']);
Dotenv::required(['DATABASE_DSN','DATABASE_USER','DATABASE_PASSWORD']);