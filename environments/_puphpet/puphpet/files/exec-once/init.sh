cd /var/www
composer self-update
composer global require "fxp/composer-asset-plugin:1.0.0-beta3"
composer install
./init --env=Development --overwrite=n
./yii migrate/up --interactive=0
./yii user/create admin@phundament.vagrant admin
./yii user/password admin admin1234
./yii user/confirm admin
echo "-------------------------------------------------------------"
echo "NOTE! User 'admin' with default password 'admin1234' created."
echo "-------------------------------------------------------------"