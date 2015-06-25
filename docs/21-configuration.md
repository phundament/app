Configuration
=============

## Environment & application

The Phundament config structure is straight forward, there are just two config files for an application:

 - [`.env`](https://github.com/phundament/app/blob/master/.env-dist) - environment dependend configuration
 - [`config/main.php`](https://github.com/phundament/app/blob/master/config/main.php) - application configuration

Compared to `yii2-app-basic` and `yii2-app-advanced` Phundament uses an environment variables based configuration instead
of an `init` script. See also [Dev/prod parity](http://12factor.net/dev-prod-parity) for more information about this topic.


### Hierachy

From highest to lowest priority. ENV variable are immutable by default, so if a value is set in a `Dockerfile`, you can not
 overwrite it in your `.env` file, but in `docker-compose.yml`

1. `docker-compose.yml`
2. `docker-compose_env-file`
3. `Dockerfile`
4. `.env`

> Note! While in Yii configuration files the last value takes precedence, because they are based on PHP arrays and merged 
> together, ENV variables are immutable by default.


## Database migrations

Lookup paths for migrations can be defined in application configuration, for details see [dmstr/yii2-migrate-command](https://github.com/dmstr/yii2-migrate-command/blob/master/README.md).

    'params'      => [
        'yii.migrations' => [
            '@yii/rbac/migrations',
            '@dektrium/user/migrations',
            '@vendor/lajax/yii2-translate-manager/migrations',
            '@bedezign/yii2/audit/migrations'
        ]
    ]
 
---

*Continue to [Customization](30-customize.md)*