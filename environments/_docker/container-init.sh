./yii migrate/up --interactive=0
./yii user/create $ADMIN_EMAIL admin
./yii user/password admin $ADMIN_PASSWORD
./yii user/confirm admin