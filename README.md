Phundament 4.0.x-dev
====================

> Please note: This is a `dev` version. Do **NOT** use it for production yet.

Phundament is a PHP Application Foundation based on Yii Framework 2.0 best for rapidly developing web
applications.

If you're looking for the Yii 1.1 version of Phundament please visit our [`master` branch](https://github.com/phundament/app).

Quick-Start
-----------

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the Phundament application template using the following command:

~~~
composer.phar create-project phundament/app:4.0.x-dev app-v4
~~~

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


Documentation Overview
----------------------

- [About Phundament](docs/about.md)
- [Installation](docs/install.md)
- [Configuration](docs/configuration.md)
- [Directory Structure](docs/structure.md)
- [Testing](testing.md)
- [Generating Documentation](apidoc.md)

---

- [Online HTML version](http://docs.phundament.com/4.0/guide-index.html) of this documentation.
- [API Class Reference  HTML version](http://docs.phundament.com/4.0/)


