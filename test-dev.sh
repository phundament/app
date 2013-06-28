php54 -S localhost:31415 -t www/ &

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
codecept.phar run unit

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
codecept.phar run functional

rm app/data/test.db
app/yiic migrate --connectionID=dbTest --interactive=0 > /dev/null
codecept.phar run acceptance