rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
vendor/bin/codecept run unit

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
vendor/bin/codecept run functional

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
vendor/bin/codecept run acceptance