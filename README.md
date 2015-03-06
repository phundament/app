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

### Composer installation

You can install _Phundament 4_ using [composer](https://getcomposer.org/download/)...

    composer global require "fxp/composer-asset-plugin:1.0.0"
    composer create-project --stability=beta phundament/app myapp

Create and adjust your environment configuration, eg. add a database...

    cd myapp
    cp .env-dist .env
    edit .env
    
Run the application setup...
    
    ./yii app/setup
    
Open `http://path-to-app/web` or `http://path-to-app/web?r=admin` in your browser.


### Docker installation

> Note: `docker-compose` was originally named fig and is available [here](https://github.com/docker/fig/releases).

First pull the latest version of the container image

    docker pull phundament/app

Create your application folder    
    
    mkdir myapp
    cd myapp
    
And copy the source code from the image    
    
    docker run -v `pwd`:/install phundament/app:4.0-development cp -r /app/. /install

Now you can start your application by bringing up the `web` service

    docker-compose up web
    
If you're running a [reverse proxy container](docs/51-docker-virtual-hosts.md) you can acces the application under [myapp.192.168.59.103.xip.io](http://myapp.192.168.59.103.xip.io).
Or check the container port with `docker-compose ps`.


> Note: Further installation methods with [Docker](https://github.com/phundament/app/blob/master/docs/51-docker.md), [fig (docker-compose)](https://github.com/phundament/app/blob/master/docs/51-fig.md), [Vagrant & Docker](https://github.com/phundament/app/blob/master/docs/51-vagrant-docker.md) or [PaaS](https://github.com/phundament/app/blob/master/docs/52-paas.md) are available in the documentation.

Resources
---------

- [Documentation](docs/README.md)
- [Project Source-Code](https://github.com/phundament/app)
- [Website](http://phundament.com)
- [Team](https://github.com/orgs/phundament/teams)
- [Imprint](http://herzogkommunikation.de/de/impressum-7.html)
