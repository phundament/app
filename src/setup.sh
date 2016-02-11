#!/usr/bin/env bash

set -e

mkdir -p /app/web/assets /app/runtime
mkdir -p /app/runtime/mail /app/runtime/cache /app/runtime/debug

./yii app/version
./yii db/create
./yii migrate --interactive=0 --migrationLookup=${APP_MIGRATION_LOOKUP}
./yii app/setup-admin-user --interactive=0

# TODO: temporary workaround, folders create by appcli, are not writable by appfpm
# TODO: chmod -R 777 /app/web/assets /app/runtime

echo "\nApplication initialized."
