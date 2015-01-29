Configuration
=============

The Phundament config structure is straight forward, there are three config files for an application:

 - [`.env`](https://github.com/phundament/app/blob/master/.env-dist) - environment dependend configuration
 - [`config/main.php`](https://github.com/phundament/app/blob/master/config/main.php) - application configuration


Compared to `yii2-app-basic` and `yii2-app-advanced` Phundament uses an environment variables based configuration instead
of an `init` script. See also [Dev/prod parity](http://12factor.net/dev-prod-parity).

### Virtual Hosts and nice URLs
 
If you choose `APP_PRETTY_URLS=1` in your `.env` file, activate the `web/.htaccess` if you are devleoping on your local machine.

```
cp web/.htaccess-dist web/.htaccess
```
