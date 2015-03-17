#!/bin/sh

# Clean and prepare build
# see https://github.com/yiisoft/yii2/issues/7414, https://github.com/yiisoft/yii2/issues/7473
rm -rf web/assets-prod
mkdir -p web/assets-prod/js
mkdir -p web/assets-prod/css
touch web/assets-prod/js/backend-temp.js
touch web/assets-prod/css/all-temp.css

# Compress asset bundles in Docker container
docker-compose run cli ./yii asset config/assets.php config/assets-prod.php