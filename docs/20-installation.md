Installation
============

Get it!
-------

`composer create-project --stability=dev phundament/app:4.0.x-dev app-v4`

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

Alternatives
------------

You can also use develop your local application with [fig and docker](https://github.com/phundament/app/blob/master/docs/51-fig.md) or [vagrant](51-vagrant.md). 

For deployments use can choose between [vagrant on a cloud- or remote-server](https://github.com/phundament/app/blob/master/docs/51-vagrant-cloud.md) or various [Platform as a Service](https://github.com/phundament/app/blob/master/docs/52-paas.md) providers.

> Although we strongly recommend the `Dotenv` configuration, you may also choose the configuration options *Development* and *Production* as described in the standard `yiisoft/yii2-advanced-app`.
