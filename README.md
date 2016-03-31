Phundament 4
============

Phundament is a dockerized 12factor PHP application template for Yii Framework 2.0.

- Full [documentation](https://github.com/phundament/docs)
- [Demo](https://github.com/phundament/playground) at Phundament playground

Requirements
------------

- [docker](https://docs.docker.com/engine/installation/)
- [docker-compose](https://docs.docker.com/compose/) **>=1.6.2**

> For alternative installation methods, such as composer, see the [docs](https://github.com/phundament/docs).  


Installation
------------

[Download](https://github.com/phundament/app/releases) or clone the repository and go to the application directory

    git clone https://github.com/phundament/app
    cd app

> Heads up! Phundament features `Makefile` targets for development and continuous integration, type `make help` to see 
> all available targets or `make all` to run installation and setup.

Create environment configuration files   
    
    cp .env-dist .env
    cp docker-compose.override-dist.yml docker-compose.override.yml

Start the application stack

    docker-compose up -d

Run setup commands
    
    docker-compose run php composer install
    docker-compose run php setup.sh

After startup is complete, open `http://<DOCKER_HOST>:40080` to access the application and login with `admin`/`admin`.


Configuration
-------------

### Environment overrides - `docker-compose.override.yml`

 - host-volumes for local development
 - port mappings

### Environment defaults - `docker-compose.yml`

You can override any ENV variable in `.env` within a `docker-compose.yml` file.
     
 - `VIRTUAL_HOST` `~^myapp\.` Virtual-host configuration for reverse proxy, adjust the virtual host parameter 
    for web application, we'll use it later to easily access the web-server through a wildcard DNS.

### Application defaults - `.env`

During development, it is recommended to change application configuration in the `.env` file, since it does not require restarting the containers. 

*Application*

 - `APP_NAME` unique application and container identifier *[a-z0-9]*
 - `APP_TITLE` display name of the application
 - `APP_LANGUAGES` available languages for URL manager (eg. `en,de`)
 - `APP_ADMIN_EMAIL` e-mail address of application admin user (default in `./yii app/create-admin-user`)
 - `APP_ADMIN_PASSWORD` password of application admin user (default in `./yii app/create-admin-user`)
 - `APP_MIGRATION_LOOKUP` comma separated list of Yii aliases to look for database migrations, eg. `@app/migrations/data`
 - `APP_CONFIG_FILE` custom configuration file to load
 - `APP_COOKIE_VALIDATION_KEY` unique and random string to prevent XSS
 - `APP_PRETTY_URLS` enable or disable nice URLs, allowed values `1` (yes) or `0` (no)
 - `APP_ASSET_FORCE_PUBLISH` force asset publishing after any changes to asset files. **Note!** This may degrade performance, use *only during development*.

*Framework*
 
 - `YII_DEBUG` wheter to enable more verbose application output, eg. on PHP exceptions.
 - `YII_ENV` Yii application mode, allowed values `dev`, `prod` or `test`
 - `YII_TRACE_LEVEL` amount of caller levels to display for logging.
 
*Database*
 
 - `DB_ENV_MYSQL_ROOT_USER` user to create databases
 - `DB_ENV_MYSQL_ROOT_PASSWORD` root password, eg. set from `"${DB_ENV_MARIADB_PASS}"`
 - `DB_ENV_MYSQL_DATABASE` database name
 - `DB_ENV_MYSQL_PASSWORD` database password
 - `DB_ENV_MYSQL_USER` database user
 - `DB_PORT_3306_TCP_ADDR` database hostname
 - `DB_PORT_3306_TCP_PORT` database port
 - `DATABASE_TABLE_PREFIX` table prefix for default database connection


### Application configuration - `config/main.php`

For details of available application configuration, please refer to the Yii 2.0 Framework Definitive Guide. 

### Settings

Web UI for application wide key-value store.

- **`pages` Sitemap**
 - `availableRoutes`
- **`schmunk42.markdocs` Markdown** 
 - `markdownUrl` URL or local path for markdown eg. `https://raw.githubusercontent.com/phundament/docs/master`
 - `defaultIndexFile` eg. `1-introduction/about.md`
- **`cms.assets` Assets/LESS** 
 - `useDbAsset` boolean

### Users & permissions

#### Default users

- `admin`

#### Default roles

- `Editor`
- `Public`

:bulb: To enable public access you need to assign permissions, like `app_site`, `docs_default`, to the `Public` role. 


Testing
-------

First, build your application image

    docker-compose build 

Set environment variables for test stack

    export COMPOSE_PROJECT_NAME=testapp
    export BUILD_PREFIX=app

Start test stack and enter tester CLI container

    docker-compose -f docker-compose.yml -f build/compose/test.override.yml up -d    
    docker-compose -f docker-compose.yml -f build/compose/test.override.yml run tester bash    

Setup application *(container bash)*    
    
    $ setup.sh

Run test suites *(container bash)*

    $ codecept run functional prod
    $ codecept run acceptance prod

> :information_source: `YII_ENV` must be set to `test` when running codeception.


Deployment
----------

Required variables for building & pushing docker images.

- `REGISTRY_USER`
- `REGISTRY_PASS`
- `REGISTRY_HOST`
- `IMAGE_NAME`


Links
-----

- [Documentation](https://github.com/phundament/docs)
- [Project Source-Code](https://github.com/phundament/app)
- [Website](http://phundament.com)
- [Team](https://github.com/orgs/phundament/teams)
- [Imprint](http://herzogkommunikation.de/de/impressum-7.html)
- Version [![Latest Stable Version](https://poser.pugx.org/phundament/app/v/stable.png)](https://packagist.org/packages/phundament/app)
- Packagist [![Total Downloads](https://poser.pugx.org/phundament/app/downloads.png)](https://packagist.org/packages/phundament/app)
- GitLab CI [![build status](https://git.hrzg.de/phundament/app/badges/master/build.svg)](https://git.hrzg.de/phundament/app/builds?scope=all)
- Travis CI [![Build Status](https://travis-ci.org/phundament/app.svg?branch=4.0)](https://travis-ci.org/phundament/app)

-----------

Built by [*dmstr](http://diemeisterei.de), Stuttgart :de:

