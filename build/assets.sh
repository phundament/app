#!/bin/sh

rm -rf web/assets-prod
mkdir -p web/assets-prod/js
mkdir -p web/assets-prod/css

touch web/assets-prod/js/backend-temp.js
touch web/assets-prod/css/all-temp.css

docker-compose run web ./yii asset config/assets.php config/assets-prod.php