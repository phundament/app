Phundament
==========

**Version 3-0.22.0**


What is Phundament?
-------------------

Phundament is a solid, highly customizable universal application foundation built with [composer](http://getcomposer.org) 
upon [Yii Framework](http://yiiframework.com). 

It's goal is the seamless integration of Yii extensions and libraries bundled in composer packages packages. 
[Read on…](https://github.com/phundament/app/wiki/Phundament)


Quick-Start
-----------

### Step 1
   Option A) If you have [composer already installed](http://getcomposer.org/doc/00-intro.md#installation-nix)
   
```
composer.phar create-project --prefer-dist phundament/app my-app
```
   
   Option B) [Download](https://github.com/phundament/app/tags), extract, enter the app root folder
      and start the installation process with
```
php composer.phar create-project --prefer-dist
```

When asked, create local configuration files and choose your environment.

### Step 2

Apply the database migrations and enter your desired admin credentials.

```
cd my-app
app/yiic migrate
```

### Step 3

Open `http://localhost/my-app/www/index.php` in your browser

[Manage your application](https://github.com/phundament/app/wiki/Content-Management)

*You may add the `--no-dev` option for production systems or use `--prefer-source` if you want to develop packages.*

*Note: if you want to install Phundament 3 with a MySQL database, you have to update your config first, see the [Setup](https://github.com/phundament/app/wiki/Setup) section in our wiki.*

Documentation
-------------

 * [The Definitive Guide to Phundament](https://github.com/phundament/app/wiki)

Demo
----

 * Try a test-drive at the [Demo Page](http://demo.phundament.com/3.0-dev)
   * Login with `admin` / `admin`. **The demo website will be resetted every 6 hours.**


Resources
---------

[![Latest Stable Version](https://poser.pugx.org/phundament/app/v/stable.png)](https://packagist.org/packages/phundament/app)
[![Total Downloads](https://poser.pugx.org/phundament/app/downloads.png)](https://packagist.org/packages/phundament/app)

[![Latest Unstable Version](https://poser.pugx.org/phundament/app/v/unstable.png)](https://packagist.org/packages/phundament/app)
[![Build Status](https://travis-ci.org/phundament/app.png?branch=develop)](https://travis-ci.org/phundament/app)

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/phundament/app/badges/quality-score.png?s=4d1ce01151a4e82df75b563e7ccf0001cc227bd1)](https://scrutinizer-ci.com/g/phundament/app/)
[![Dependencies Status](https://depending.in/phundament/app.png)](http://depending.in/phundament/app)

### Fundamentals
 *  [Documentation](https://github.com/phundament/app/wiki/)
 *  [API Class Reference](http://docs.phundament.com/3.0)
 *  [FAQ / Troubleshooting](https://github.com/phundament/app/wiki/FAQ)
 *  [Support](https://github.com/phundament/app/wiki/Support)
 *  [Report a bug](https://github.com/phundament/app/issues)
 *  Composer Repository [packages.phundament.com](http://packages.phundament.com)

### Information
 *  [CHANGELOG](https://github.com/phundament/app/blob/master/CHANGELOG.md)
 *  [License](https://github.com/phundament/app/blob/master/LICENSE) BSD

### Links
 *  [Phundament Website](http://phundament.com)
 *  [View at Yii Extensions](http://www.yiiframework.com/extension/phundament/)
 *  [View at packagist.org](https://packagist.org/packages/phundament/app)
 *  [Fork on github](https://github.com/phundament/app)
 *  [Downloads](https://github.com/phundament/app/tags)
 *  [Continuous Integration](https://travis-ci.org/phundament/app.png?branch=master)  
 *  [Company Website](http://herzogkommunikation.de)
 *  [Demo Website](http://demo.phundament.com/3.0-dev/)

### Social Networks
 *  [Twitter](http://twitter.com/#!/phundament)
 *  [Facebook](http://www.facebook.com/phundament)
 *  [Google+](https://plus.google.com/114873431066202526630)

### Contact
 *  phundament@usrbin.de
