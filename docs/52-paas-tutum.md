Tutum
-----

Get an app:

    git clone https://github.com/phundament/app myapp
    cd myapp

Initialize application:

    ./init --env=Dotenv
    cp ./environments/_tutum/Dockerfile .
    cp ./environments/_tutum/tutum-run.sh .

Edit your `.env` variables and map the database credentials:

    DATABASE_DSN=mysql:host={$DB_PORT_3306_TCP_ADDR};port={$DB_PORT_3306_TCP_PORT};dbname={$DB_ENV_MYSQL_DATABASE}
    DATABASE_USER={$DB_ENV_MYSQL_USER}
    DATABASE_PASSWORD={$DB_ENV_MYSQL_PASSWORD}

Build, tag and push update image:

    docker build -t myapp .
    docker tag myapp tutum.co/USERNAME/myapp
    docker push tutum.co/USERNAME/myapp

Create an database service and link the Phundament app to it and run:

    export APPNAME="myapp"

    tutum service run -n $APPNAME-mysql \
      -e "MYSQL_ROOT_PASSWORD=supersecret" \
      -e "MYSQL_USER=dev" \
      -e "MYSQL_PASSWORD=7dbd87csai1" \
      -e "MYSQL_DATABASE=p4" \
      mysql

    tutum service run -n $APPNAME-app \
      --link-service $APPNAME-mysql:DB \
      tutum.co/USERNAME/myapp

The application should be available under an URL similar to `http://phundament-app-1.XXXXXX-USERNAME.node.tutum.io:PORT`.