#!/usr/bin/env bash

mkdir -p /app/web/assets /app/runtime
chmod -R 777 /app/web/assets /app/runtime

composer install

./yii app/create-mysql-db
./yii migrate --interactive=0
./yii app/setup-admin-user --interactive=0

# TODO: temporary workaround, folders create by appcli, are not writable by appfpm
mkdir -p /app/runtime/mail /app/runtime/cache /app/runtime/debug
chmod -R 777 /app/web/assets /app/runtime/mail /app/runtime/cache /app/runtime/debug

echo "\nApplication initialized."
