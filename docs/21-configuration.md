Configuration
=============

The Phundament config structure is straight forward, there are three config files for an application:

 - `.env` - environment depended configuration
 - `frontend/config/main.php` - application configuration
 - `common/config/main.php` -  shared application configuration


If you choose `APP_PRETTY_URLS=1` in your `.env` file, activate the `/frontend/web/.htaccess`

```
cp frontend/web/.htaccess-dist frontend/web/.htaccess
```


> This also applies to `backend` and `console`.
 
See also [Dev/prod parity](http://12factor.net/dev-prod-parity).
