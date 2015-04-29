Phundament 4
============

Phundament is a dockerized 12factor PHP application template for Yii Framework 2.0.


Quick-Start
-----------

Clone the repository

    git clone https://github.com/phundament/app 

Make the application stack

    docker-compose up

> For alternative installation methods see the [docs](docs/20-installation-composer.md).


Configuration
-------------

### Environment - `docker-compose.yml`
     
 - **VIRTUAL_HOST** : `~^myapp\.` - Virtual-host configuration for reverse proxy, adjust the virtual host parameter 
    for web application, we'll use it later to easily access the web-server through a wildcard DNS.


### Environment defaults - `.env`

 - **APP_ADMIN_EMAIL**: e-mail address of application admin user
 - **APP_ADMIN_PASSWORD**: password of application admin user
 - **APP_ASSET_FORCE_PUBLISH**: force asset publishing after any changes to asset files
 - **APP_COOKIE_VALIDATION_KEY**: unique and random string to prevent XSS
 - **APP_ID**: unique application and container identifier (only lowercase letters and number)
 - **APP_MIGRATION_LOOKUP** : comma separated list of Yii aliases to look for database migrations, eg. `@app/migrations/data`
 - **APP_NAME**: display name of the application
 - **APP_PRETTY_URLS**: enable or disable nice URLs, allowed values `1` (yes) or `0` (no)
 - **APP_SUPPORT_EMAIL**: e-mail address for the application eg. `support@myapp.local`
 
 Framework
 
 - **YII_DEBUG**: wheter to enable more verbose application output, eg. on PHP exceptions.
 - **YII_ENV**: Yii application mode, allowed values `dev`, `prod` or `test`
 - **YII_TRACE_LEVEL** amount of caller levels to display for logging.
 
 Database variables
 
 - **DB_ENV_MYSQL_DATABASE**: database name
 - **DB_ENV_MYSQL_PASSWORD**: database password
 - **DB_ENV_MYSQL_USER**: database user
 - **DB_PORT_3306_TCP_ADDR**: database hostname
 - **DB_PORT_3306_TCP_PORT**: database port

### Application settings - `config/main.php`

For details of available application configuration, please refer to the Yii 2.0 Framework Definitive Guide. 


Demo
----

> A demo can be found at  the [Phundament Playground Application](https://github.com/phundament/playground/blob/master/README.md#phundament-developer-playground) Demo! 
> You can get the source-code of the demo application from its [GitHub repository](https://github.com/phundament/playground).


Resources
---------

- [Documentation](docs/README.md)
- [Project Source-Code](https://github.com/phundament/app)
- [Website](http://phundament.com)
- [Team](https://github.com/orgs/phundament/teams)
- [Imprint](http://herzogkommunikation.de/de/impressum-7.html)
