#!/usr/bin/env bash

composer install
./yii app/create-mysql-db
./yii migrate
./yii app/setup-admin-user