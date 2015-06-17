#!/usr/bin/env bash

mkdir /app/web/assets /app/runtime
chmod 777 /app/web/assets /app/runtime

composer install

./yii app/create-mysql-db
./yii migrate --interactive=0
./yii app/setup-admin-user --interactive=0

echo "\nApplication initialized"

tail -f /dev/null