Phundament 4 Application
========================

*Version 4.0-dev*
-----------------

** THIS IS A VERY EARLY DEVELOPMENT VERSION - DO NOT USE FOR PRODUCTION!**

Phundament 4 is a foundation based on Yii 2 framework best for rapidly developing web 
applications.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mails/              contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



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
composer.phar --no-dev --stability=dev create-project phundament/app:4.0.x-dev app-v4
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install via Vagrant

Download and install [Vagrant](http://www.vagrantup.com/downloads.html) and [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Clone the project:

~~~
git clone -b4.0 https://github.com/phundament/app
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
