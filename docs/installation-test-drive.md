### Docker installation

#### Requirements

First pull the latest version of the container image

    docker pull phundament/app

Create your application folder    
    
    mkdir myapp
    cd myapp
    
And copy the source code from the image    
    
    docker run --rm -v `pwd`:/app phundament/php cp -r /app-src/. /app

Now you can start your application by bringing up the `web` service

    docker-compose up -d web
    
If you're running a [reverse proxy container](docs/51-docker-virtual-hosts.md) you can acces the application under [myapp.192.168.59.103.xip.io](http://myapp.192.168.59.103.xip.io).
Or check the container port with `docker-compose ps`.
