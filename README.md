Phundament 4
============

Phundament is a dockerized 12factor PHP application template for Yii Framework 2.0.

Resources
---------

- [Documentation](docs/README.md)
- [Project Source-Code](https://github.com/phundament/app)
- [Website](http://phundament.com)
- [Team](https://github.com/orgs/phundament/teams)
- [Imprint](http://herzogkommunikation.de/de/impressum-7.html)

Quick-Start
-----------

Clone the repository and go to the application directory

    git clone https://github.com/phundament/app

Create environment configuration file    
    
    cd app
    cp .env-dist .env

Start the application stack

    docker-compose up -d

Find the port for the application nginx service

    docker-compose port appnginx 80

And open the application in your browser, eg. `http://dockerhost:34567`    

### Additional information

List all services    
    
    docker-compose ps

Show and follow logs    
    
    docker-compose logs

> For alternative installation methods see the [docs](docs/20-installation-composer.md).  

Demo
----

### Test-drive with docker compose

    curl -o docker-compose.yml https://raw.githubusercontent.com/phundament/app/master/tutum.yml    
    docker-compose up -d

### Online Demo

> A demo can be found at  the [Phundament Playground Application](https://github.com/phundament/playground/blob/master/README.md) Demo! 
> You can get the source-code of the demo application from its [GitHub repository](https://github.com/phundament/playground).

### PaaS / cloud service

[![Deploy to Tutum](https://s.tutum.co/deploy-to-tutum.svg)](https://dashboard.tutum.co/stack/deploy/)

    
Configuration
-------------


### Environment defaults - `.env`

> During development, it is recommended to change application configuration in the `.env` file, since it does not require restarting the containers. 

*Identifier*

 - `APP_NS` namespace for the application, used i.e. for Docker image tags *[a-z0-9]*
 - `APP_NAME` unique application and container identifier *[a-z0-9]*
 - `APP_TITLE` display name of the application

*Application*
 
 - `APP_MIGRATION_LOOKUP` comma separated list of Yii aliases to look for database migrations, eg. `@app/migrations/data`
 - `APP_ADMIN_EMAIL` e-mail address of application admin user (default in `./yii app/create-admin-user`)
 - `APP_ADMIN_PASSWORD` password of application admin user (default in `./yii app/create-admin-user`)
 - `APP_SUPPORT_EMAIL` e-mail address for the application, eg. `support@myapp.local`
 - `APP_COOKIE_VALIDATION_KEY` unique and random string to prevent XSS
 - `APP_PRETTY_URLS` enable or disable nice URLs, allowed values `1` (yes) or `0` (no)

*Application development settings*

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


### Environment overrides - `docker-compose.yml`

> You can override any ENV variable in `.env` within a `docker-compose.yml` file.
     
 - `VIRTUAL_HOST` `~^myapp\.` Virtual-host configuration for reverse proxy, adjust the virtual host parameter 
    for web application, we'll use it later to easily access the web-server through a wildcard DNS.


### PHP Application settings - `config/main.php`

For details of available application configuration, please refer to the Yii 2.0 Framework Definitive Guide. 

-----------

*Developed by diemeisterei GmbH, Stuttgart.*