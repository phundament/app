Phundament 4.0.x-dev
====================

> Please note: This is a `dev` version. Do **NOT** use it for production yet.

_Phundament_ is a _PHP_ application foundation based on _Yii Framework 2.0_.

Features
--------

- guided CLI setup process
- application backend dashboard (wip)
- user management module
- package browser module (wip)
- extended database migration support
- extended model & crud code generators

Quick-Start
-----------

You can install the _Phundament 4_ application template using the following command:

~~~
composer global require "fxp/composer-asset-plugin:1.0.0-beta2"
composer create-project --stability=dev phundament/app:4.0.x-dev app-v4
~~~

The project creation process will trigger the `Yii Application Initialization Tool` command to setup your application.

> "We recommend you to choose `Development` as environment and skip through the options, if it's your very first setup."

Open `http://path/to/frontend/web` in your browser.

Continue with the [installation](docs/install.md) to configure your desired setup.

Documentation Overview
----------------------

- Phundament 4 Guide [Markdown](docs/index.md) (latest version)
- Phundament 4 Guide [HTML version](http://docs.phundament.com/4.0/guide-index.html)
- Phundament 4 API [HTML version](http://docs.phundament.com/4.0/)
- Yii2 Guide [HTML Version](http://www.yiiframework.com/doc-2.0/guide-index.html)

If you're looking for the Yii 1.1 version of Phundament please visit our [`master` branch](https://github.com/phundament/app).

---

> "Hey There! This file is part of **your project** now and should contain some useful information about it.
> Feel free to modify it accordingly to your needs and remove this marker."
