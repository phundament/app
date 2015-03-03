#!/bin/sh

set -e

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

# Build assets
sh build/assets.sh

# Build production image
docker build -f Dockerfile-production -t $APP_ID:production .
echo "\nDocker image '${APP_ID}:production' built and tagged."

# Start production image
docker-compose -f build/production.yml up

popd