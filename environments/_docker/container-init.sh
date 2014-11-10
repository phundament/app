cd /app
./yii migrate/up --interactive=0
./yii user/create $APP_ADMIN_EMAIL admin
./yii user/password admin $APP_ADMIN_PASSWORD
./yii user/confirm admin