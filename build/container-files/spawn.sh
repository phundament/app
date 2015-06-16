#!/bin/bash

set -e

cp -r /app/. /app-install/
mkdir -p /app-install/build/container-files /app-install/web/assets
touch /app-install/.env-dist