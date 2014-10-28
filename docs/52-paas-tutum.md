Tutum
-----

Get an app:

    git clone https://github.com/phundament/app myapp
    cd myapp

Initialize application:

    ./init --env=Dotenv
    cp ./environments/_tutum/Dockerfile .
    cp ./environments/_tutum/tutum-run.sh .

Build, tag and push update image:

    docker build -t myapp .
    docker tag myapp tutum.co/USERNAME/myapp
    docker push tutum.co/USERNAME/myapp

Create an database service and link the Phundament app to it and run:

    export APPNAME="phundament"

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