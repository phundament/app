Phundament
==========

**Version 4.0.x-dev**

What is it?
-----------

Phundament is a PHP Application Foundation based on Yii Framework 2.0 best for rapidly developing web
applications.

> Please note: This is a `dev` version. Do **NOT** use it for production yet.

If you're looking for the Yii 1.1 version of Phundament please visit our [`master` branch](https://github.com/phundament/app).



Get started!
------------

> The minimum requirement by this application template that your Web server supports PHP 5.4.0.


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the Phundament application template using the following command:

~~~
composer.phar create-project phundament/app:4.0.x-dev app-v4
~~~

Now you should be able to access the application through the following URL, assuming `app-v4` is the directory
directly under the Web root.

~~~
http://localhost/app-v4/web/
~~~

Installation via Vagrant can be found in the [installation docs](docs/install.md).



Getting Started
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Set document roots of your Web server:

- for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
- for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

To login into the application, you need to first sign up, with any of your email address, username and password.
Then, you can login into the application with same email address and password at any time.

Testing
-------

Install additional composer packages:
* `php composer.phar require --dev "codeception/codeception: 1.8.*@dev" "codeception/specify: *" "codeception/verify: *"`

This application boilerplate use database in testing, so you should create three databases that are used in tests:
* `yii2_advanced_unit` - database for unit tests;
* `yii2_advanced_functional` - database for functional tests;
* `yii2_advanced_acceptance` - database for acceptance tests.

To make your database up to date, you can run in needed test folder `yii migrate`, for example
if you are starting from `frontend` tests then you should run `yii migrate` in each suite folder `acceptance`, `functional`, `unit`
it will upgrade your database to the last state according migrations.

To be able to run acceptance tests you need a running webserver. For this you can use the php builtin server and run it in the directory where your main project folder is located. For example if your application is located in `/www/advanced` all you need to is:
`cd /www` and then `php -S 127.0.0.1:8080` because the default configuration of acceptance tests expects the url of the application to be `/advanced/`.
If you already have a server configured or your application is not located in a folder called `advanced`, you may need to adjust the `TEST_ENTRY_URL` in `frontend/tests/_bootstrap.php` and `backend/tests/_bootstrap.php`.

After that is done you should be able to run your tests, for example to run `frontend` tests do:

* `cd frontend`
* `../vendor/bin/codecept build`
* `../vendor/bin/codecept run`

In similar way you can run tests for other application tiers - `backend`, `console`, `common`.

You also can adjust you application suite configs and `_bootstrap.php` settings to use other urls and files, as it is can be done in `yii2-basic`.




Based upon Yii 2 Advanced Application Template
----------------------------------------------

Yii 2 Advanced Application Template is a skeleton Yii 2 application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

### DIRECTORY STRUCTURE

```
common
	config/				contains shared configurations
	mail/				contains view files for e-mails
	models/				contains model classes used in both backend and frontend
	tests/				contains various tests for objects that are common among applications
console
	config/				contains console configurations
	controllers/		contains console controllers (commands)
	migrations/			contains database migrations
	models/				contains console-specific model classes
	runtime/			contains files generated during runtime
	tests/				contains various tests for the console application
backend
	assets/				contains application assets such as JavaScript and CSS
	config/				contains backend configurations
	controllers/		contains Web controller classes
	models/				contains backend-specific model classes
	runtime/			contains files generated during runtime
	tests/				contains various tests for the backend application
	views/				contains view files for the Web application
	web/				contains the entry script and Web resources
frontend
	assets/				contains application assets such as JavaScript and CSS
	config/				contains frontend configurations
	controllers/		contains Web controller classes
	models/				contains frontend-specific model classes
	runtime/			contains files generated during runtime
	tests/				contains various tests for the frontend application
	views/				contains view files for the Web application
	web/				contains the entry script and Web resources
vendor/					contains dependent 3rd-party packages
environments/			contains environment-based overrides
```




Read on...
----------

- Documentation [Markdown](docs/index.md) [HTML*](http://docs.phundament.com/4.0/guide-index.html)
- API Class reference [HTML*](http://docs.phundament.com/4.0)
- [Website](http://phundament.com)

\* Work in progress
