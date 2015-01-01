cd /var/www
composer self-update
composer global require "fxp/composer-asset-plugin:1.0.0-beta4"
composer install
./yii app/setup --interactive=0
