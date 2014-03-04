Phundament 4 Application
========================

*Version 4.0-dev*
-----------------

** THIS IS A VERY EARLY DEVELOPMENT VERSION - DO NOT USE FOR PRODUCTION!**

Phundament 4 is a foundation based on Yii 2 framework best for rapidly developing web 
applications.


DIRECTORY STRUCTURE
-------------------

      app/assets/             contains assets definition
      app/commands/           contains console commands (controllers)
      app/config/             contains application configurations
      app/controllers/        contains web controller classes
      app/mails/              contains view files for e-mails
      app/models/             contains model classes
      app/runtime/            contains files generated during runtime
      app/tests/              contains various tests for the basic application
      app/views/              contains view files for the web application
      puphet                  contains Vagrant (VM) configuration
      vendor/                 contains dependent 3rd-party packages
      web/                    contains the entry script and web resources



REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following command:

~~~
composer.phar create-project phundament/app:4.0.x-dev app-v4
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install via Vagrant

Download and install [Vagrant](http://www.vagrantup.com/downloads.html) and [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Get the project without installing it, vagrant will do that later.

~~~
composer.phar create-project --no-install phundament/app:4.0.x-dev app-v4
~~~

Bring up the virtual machine:

~~~
cd app
vagrant up
~~~

In the meantime, update your `/etc/hosts` file:

~~~
192.168.33.101    phundament.vagrant
~~~ 

Open [phundament.vagrant](http://192.168.33.101/phundament.vagrant) in your browser.


DOCUMENTATION
-------------

*tbd*

**Since Phundament is a template for your custom application, please update this document with your project
specific documentation and setup process.**


YII2 DEVELOPMENT PACKAGES
-------------------------

Rename `composer.json.dev` and update `web/index.php`

```
require(__DIR__ . '/../vendor/yiisoft/yii2-dev/framework/Yii.php');
```
