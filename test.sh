rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0
chmod 777 app/data/test.db
vendor/bin/codecept run unit

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0
chmod 777 app/data/test.db
vendor/bin/codecept run functional

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0
chmod 777 app/data/test.db
vendor/bin/codecept run acceptance