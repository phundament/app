
Get Phundament!
---------------

> Note: Have a look at the [deployments](50-deploy.md) section if you prefer setting up Phundament with Docker, Vagrant or PaaS.

```
composer create-project --stability=beta phundament/app
```


Setup your environment
----------------------

### Database setup

Create a new database to store application information.

> Note! Currently a MySQL database is required for the user module.

### Application configuration with environment variables

The setup is based on `vlucas/dotenv`, which reads environment variables from the system or a local `.env` file. 
You can find background information about this topic in the [The Twelve Factor App](http://12factor.net/config) documentation.

Start by copying the default `.env` configuration file

```
cp .env-dist .env
edit .env
```

After adjusting the parameters, finalize the application setup with:

```
./yii migrate --interactive=0
./yii app/setup-admin-user --interactive=0
```

Afterwards you can access your Phundament application under `http://localhost/app/frontend/web` and `http://localhost/app/backend/web`.



### Virtual Hosts and nice URLs
 
If you choose `APP_PRETTY_URLS=1` in your `.env` file, activate the `web/.htaccess` if you are devleoping on your local machine.

```
cp web/.htaccess-dist web/.htaccess
```

> If you're working with Docker, you can use a reverse proxy to fully automate the virtual host setup.
