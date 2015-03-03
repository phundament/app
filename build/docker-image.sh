#!/bin/sh

set -e

pushd `dirname $0`/..
./yii app/version
source .env

# Build assets
mkdir -p web/assets-prod/js && touch web/assets-prod/js/backend-temp.js
docker-compose run web ./yii asset config/assets.php config/assets-prod.php

docker build -f Dockerfile-production -t $APP_ID:production .
echo "\nDocker image '${APP_ID}:production' built and tagged."

popd