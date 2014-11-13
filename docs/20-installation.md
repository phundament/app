Installation
============

Get it!
-------

> Note: Have a look at the [deployments](50-deploy.md) if you prefer a setup with Docker, vagrant or PaaS.

```
composer create-project --stability=dev phundament/app
```

Setup your environment
----------------------

### Database setup

Create a new database to store application information.

> Note! Currently a MySQL database is required for the user module.

### Application configuration with environment variables

The recommended setup is based on `vlucas/dotenv`, which reads environment variables from the system or a local `.env` file. You can find background information about this topic in the [The Twelve Factor App](http://12factor.net/config) documentation.

```
cp .env-dist .env
edit .env
```
If you choose `APP_PRETTY_URLS=1` in your `.env` file, activate the `/frontend/web/.htaccess`
```
mv frontend/web/.htaccess-dist frontend/web/.htaccess
```

After adjusting the parameters, finalize the application setup with:

```
./yii app/setup
```

Afterwards you can access your application under `http://localhost/app/frontend/web` and `http://localhost/app/backend/web`.
