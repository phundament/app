Phundament 4
============

> Please note: This is a `beta` [version](version).

Phundament is a 12factor PHP application template for Yii Framework 2.0.

[![Build Status](https://travis-ci.org/phundament/app.svg?branch=4.0)](https://travis-ci.org/phundament/app)
[![Total Downloads](https://poser.pugx.org/phundament/app/downloads.png)](https://packagist.org/packages/phundament/app)
[![Stories in Ready](https://badge.waffle.io/phundament/app.png?label=ready&title=Ready)](https://waffle.io/phundament/app)


Demo
----

Checkout the [Phundament Playground Application](https://github.com/phundament/playground/blob/master/README.md#phundament-developer-playground) Demo! 

You can get the source-code of the demo application from its [GitHub repository](https://github.com/phundament/playground).


Quick-Start
-----------

### Docker installation

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

### Composer installation

See the [docs](docs/20-installation-composer.md) for a guide how to install Phundament 4 with composer.


Settings
--------

### `docker-compose.yml`

Edit `docker-compose.yml`, adjust the virtual host parameter for web application, we'll use it later to easily access the 
  web-server through a wildcard DNS.
     
 - `VIRTUAL_HOST` : ~^myapp\.

### `.env`

 - `APP_ID` application and container identified
 - `APP_NAME` display name of the application

### `config/main.php`

Yii Application settings

> Note: Further installation methods with [Docker](https://github.com/phundament/app/blob/master/docs/51-docker.md), [fig (docker-compose)](https://github.com/phundament/app/blob/master/docs/51-fig.md), [Vagrant & Docker](https://github.com/phundament/app/blob/master/docs/51-vagrant-docker.md) or [PaaS](https://github.com/phundament/app/blob/master/docs/52-paas.md) are available in the documentation.


Resources
---------

- [Documentation](docs/README.md)
- [Project Source-Code](https://github.com/phundament/app)
- [Website](http://phundament.com)
- [Team](https://github.com/orgs/phundament/teams)
- [Imprint](http://herzogkommunikation.de/de/impressum-7.html)
