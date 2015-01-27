#!/bin/bash

set -e

function setEnvironmentVariable() {
    if [ -z "$2" ]; then
            echo "Environment variable '$1' not set."
            return
    fi
    echo "env[$1] = \"$2\"" >> /etc/php5/fpm/pool.d/www.conf
}

# Grep all ENV variables
for _curVar in `env | awk -F = '{print $1}'`;do
    # awk has split them by the equals sign
    # Pass the name and value to our function
    setEnvironmentVariable ${_curVar} ${!_curVar}
done

# wait for MySQL server, since the container may be up, but the database server not yet ready
echo "Trying to connect to MySQL server (max. 5 times)..."
while ! curl http://$DB_PORT_3306_TCP_ADDR:$DB_PORT_3306_TCP_PORT/
do
  echo "$(date) - still trying"
  ((c++)) && ((c==5)) && break
  sleep 1
done
echo "$(date) - connected successfully"

# prepare log output
mkdir -p /app/runtime/logs /app/web/assets
touch /var/log/nginx/access.log \
      /var/log/nginx/error.log \
      /app/runtime/logs/web.log \
      /app/runtime/logs/console.log
# adjust folder permissions for docker volume usage
find /app/runtime -type d -print0 | xargs -0 chmod 777
find /app/runtime -type f -print0 | xargs -r -0 chmod 666
find /app/web/assets -type d -print0 | xargs -0 chmod 777
find /app/web/assets -type f -print0 | xargs -r -0 chmod 666

# create schema, disable with APP_ENABLE_AUTOMIGRATIONS=0
if [ "$APP_ENABLE_AUTOMIGRATIONS" != 0 ] ; then
  ./yii app/create-mysql-db $DB_ENV_MYSQL_DATABASE --interactive=0
  ./yii app/setup --interactive=0
fi

# start PHP and nginx
service php5-fpm start
/usr/sbin/nginx
