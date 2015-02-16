Docker container
----------------

Pick a name for your new application, this is just for convenience to be able to copy & paste the commands below. 

```
export APP_NAME=myapp
```

Although you can also use the images with a `phundament/app` repository. It is also possible to get the source code 
from the image by mounting a `myapp` directory into the container and copying the app from the image into it and to your
host machine...

```
docker run \
    --volume `pwd`/$APP_NAME:/app-install \
    phundament/app \
    cp -r /app/. /app-install
```

Adjust the `Dockerfile` if needed, build and run the container with a linked MySQL instance, see 
[here](https://github.com/phundament/docker#setup) for instructions... 

```
cd $APP_NAME
docker build -t $APP_NAME .
```

You can now run your freshly built application container with the following command...

```
docker run \
    --detach \
    --name $APP_NAME \
    --volume `pwd`:/app \
    --link mysql1:DB \
    --publish 80 \
    --env DB_ENV_MYSQL_DATABASE=$APP_NAME \
    --env APP_NAME=$APP_NAME \
    --env VIRTUAL_HOST=$APP_NAME.127.0.0.1.xip.io,$APP_NAME.192.168.59.103.xip.io \
    $APP_NAME
```

This will start the container, setup the database and mount your current project directory into the 
application container. Therefore you are able to develop your application code on your host machine and immediately see 
the changes in the running container.

Check the state of the container with `docker ps`, your output should look similar to:

```
Kraftbuch:TESTING tobias$ docker ps
CONTAINER ID        IMAGE               COMMAND                CREATED             STATUS              PORTS                     NAMES
c197783f13b5        myapp:latest        "php -S 0.0.0.0:8000   8 seconds ago       Up 7 seconds        0.0.0.0:49165->8000/tcp   myapp
```

Access the application, eg. under `http://192.168.59.103:49165` or via the reverse proxy `open http://$APP_NAME.192.168.59.103.xip.io`. 


#### Building the `:production` image

Adjust your `Dockerfile` and build `FROM phundament/app:production`.

```
docker build -t $APP_NAME:production .

docker run \
    --detach \
    --name $APP_NAME \
    --link mysql1:DB \
    --publish 80 \
    --env DB_ENV_MYSQL_DATABASE=$APP_NAME \
    --env APP_NAME=$APP_NAME \
    --env VIRTUAL_HOST=$APP_NAME.127.0.0.1.xip.io,$APP_NAME.192.168.59.103.xip.io \
    $APP_NAME
```

> ### OS X and Windows users
> Note: If you are using volumes, build your image from the `phundament/app:development` container, due to file and directory permissions. 



### Customizing startup and webserver configuration

You can build your custom container image on top of the [Phundament 4 Docker container](https://registry.hub.docker.com/u/phundament/app/) ([repository](https://github.com/phundament/docker)). 
Just use the `FROM` instruction in your `Dockerfile`

    FROM phundament/app

Start or use a running container to copy the startup files into your `build/` directory.

    docker cp app_web_1:/root/run.sh build/
    docker cp app_web_1:/etc/nginx/sites-available/default build/
    
#### BASIC_AUTH example

Create a password file    
    
    htpasswd -c build/.htpasswd demo

Update Nginx server configuration

    location  /  {
        auth_basic "Restricted";
        auth_basic_user_file /etc/nginx/.htpasswd;
    }
    
Add these updated configuration files to the build process    

    ADD build/.htpasswd /etc/nginx/.htpasswd
    ADD build/default /etc/nginx/sites-available/default

You can then `docker build` the image like described above.
