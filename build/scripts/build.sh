#!/usr/bin/env bash

set -e

# Get commit info
APP_VERSION=$(cat version)
COMMIT_MESSAGE=$(git log -1 --pretty=%B)

echo "Application Version ${APP_VERSION}"
echo "${COMMIT_MESSAGE}"
echo "----------------------------------"

cp .env-dist .env

make TEST clean
make TEST build

exit 0