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

> Note! Currently a MySQL is required for the user module.

### Environment setup with ENV variables

Our recommended setup is based on `vlucas/dotenv`, which reads ENV variables from the system or a local file. You can find background information about this topic in the [The Twelve Factor App](http://12factor.net/config) documentation.

Run the application initialization and choose `[2] Dotenv`:

    ./init

After initializing the application you have to adjust the `.env` file in your project root.

### Application setup

```
./yii app/setup
```
