Tutum
-----

> Note! This section is under development

## Requirements

 - Docker
 - [tutum account](https://www.tutum.co)
 - AWS or DigitalOcean account or own Docker node

## Get started!

Clone an app:

    git clone https://github.com/phundament/app myapp
    cd myapp

Initialize application:

    cp .env-dist .env

Build, tag and push update image:

    export TUTUM_USER="me"
    export APP_NAME="myapp"

    docker build -t tutum.co/$TUTUM_USER/$APP_NAME .
    docker push tutum.co/$TUTUM_USER/$APP_NAME

Create an database service and link the Phundament app to it and run:

    tutum service run -n $APPNAME-mysql \
      -e "MYSQL_ROOT_PASSWORD=supersecret" \
      -e "MYSQL_USER=dev" \
      -e "MYSQL_PASSWORD=7dbd87csai1" \
      -e "MYSQL_DATABASE=p4" \
      mysql

    tutum service run -n $APP_NAME-app \
      --link-service $APP_NAME-mysql:DB \
      tutum.co/$TUTUM_USER/$APP_NAME

The application should be available under an URL similar to `http://phundament-app-1.XXXXXX-USERNAME.node.tutum.io:PORT`.


> Note: You may also create a new database in an existing MySQL container, by setting `DB_ENV_MYSQL_DATABASE`, `DB_ENV_MYSQL_USER` and `DB_ENV_MYSQL_PASSWORD` **in the `web` container**. This is done by default in `/root/run.sh` in the container.