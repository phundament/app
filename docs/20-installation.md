Installation
============

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
./yii app/setup
```

Afterwards you can access your Phundament application under `http://localhost/app/frontend/web` and `http://localhost/app/backend/web`.


Create a git repository
-------------------

Initialize a repo for your new project

    git add .
    git commit -m "inital commit"
    git remote add origin git@github.com:phundament/playground.git
    git push -u origin master

---

*Continue to [Configuration](21-configuration.md)*