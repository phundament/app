Phundament 3 App
================

**Version 0.9.0**


What is Phundament?
-------------------

Phundament 3 is a solid, highly customizable application foundation built with [composer](http://getcomposer.org) 
upon [Yii](http://yiiframework.com) 1.1 and extension packages such as [user](http://www.yiiframework.com/extension/yii-user/), [rights](http://www.yiiframework.com/extension/rights/), [yiiext](http://code.google.com/p/yiiext/), [gtc](https://github.com/schmunk42/gii-template-collection), ckeditor, jquery-file-upload, p3widgets and p3media.

For more details visit [phundament.com](http://phundament.com).


Get started
-----------

1. [Download from github](https://github.com/phundament/app/tags) & extract file
2. Enter the app root folder and run the installer
```
php composer.phar install --dev --prefer-source
```
3. Open `phundament-app/www/index.php` in your browser

*Note: if you want to install Phundament 3 with a MySQL database, you have to update your config first.*
*You may skip the `--dev` and `--prefer-source` options on production systems.*

How it works?
-------------
 * the installer retrieves the packages specified in [`composer.json`](https://github.com/phundament/app/blob/master/composer.json)
 * executes the `composer.callbacks` from [`config/console.php`](https://github.com/phundament/app/blob/master/config/console.php)
 * the web-application is pre-configured in [`config/main.php`](https://github.com/phundament/app/blob/master/config/main.php)

More [details](https://github.com/phundament/app/blob/master/docs/creating-yii-applications-with-composer.en.md).


Try a demo
----------

### Open website

[Frontend Demo Page](http://demo.phundament.com/3.0-dev)

Login with editor / editor or register by e-mail.

### First Steps

For some usage examples, [click here](https://github.com/phundament/app/wiki/Content-Management).


Troubleshooting
---------------

 * Make sure you have [git](http://git-scm.com/) and [hg](http://mercurial.selenic.com/) installed
 * zlib extension or unzip available on your PATH
 * OpenSSL Support enabled in PHP or try ```--prefer-source```
 * if you get SSL or memory limit errors, try: ```php -d allow_url_fopen=1 -d memory_limit=64M composer.phar -v update```
 * If you want to the very lastest version
   ```
   curl -L https://github.com/phundament/app/tarball/master | tar zx
   ```
 * Don't manually enable Yii `CLogger` on a fresh install



Requirements
------------

 *  PHP >5.3.2
 *  [Yii Framework Requirements] (http://www.yiiframework.com/doc/guide/1.1/en/quickstart.installation#requirements)
 *  git, hg (Mercurial), svn (subversion), php_mod_ssl (for composer)

### Tested Systems
 *  Mac OS X 10.6.8
 *  Debian 5,6
 *  Windows XP

### Supported Databases
 *  MySQL 5
 *  SQLite 3

### License
 *  [BSD](https://github.com/phundament/app/blob/0.9.0/LICENSE)



Changelog
---------

 * [CHANGELOG](https://github.com/phundament/app/blob/0.9.0/CHANGELOG.md)
 * [Packages contained in Phundament 3](https://github.com/phundament/app/blob/0.9.0/composer.lock)


Resources
---------

### Developer
 *  [Yii Extension Page](http://www.yiiframework.com/extension/phundament/)
 *  [Fork us on github](https://github.com/phundament/app)
 *  [Report a bug](https://github.com/phundament/app/issues)
 *  [FAQ / Troubleshooting](https://github.com/schmunk42/phundament/wiki/FAQ)


### Help needed?
 *  [Yii Forum](http://www.yiiframework.com/forum/index.php?/topic/24696-extension-phundament/)
 *  [Google Group phundament-dev](http://groups.google.com/group/phundament-dev/)


### Additional Ressources
 *  [Quick Start Guide](https://github.com/schmunk42/phundament/wiki/Quick-Start)
 *  [Downloads](https://github.com/phundament/app/tags)
 *  [Wiki](https://github.com/schmunk42/phundament/wiki/)
 *  [Development Discussion](http://www.yiiframework.com/forum/index.php?/topic/17591-planning-yii-cms-a-different-approach/)
 *  [Demo Website](http://demo.phundament.com/3.0-dev/)
 *  [Phundament Website](http://phundament.com)
 *  [Company Website](http://herzogkommunikation.de)

### Extensions
 *  [packages.phundament.com](http://packages.phundament.com)

### Contact
 *  phundament@usrbin.de
 *  [Twitter](http://twitter.com/#!/phundament)
 *  [Facebook](http://www.facebook.com/phundament)
 *  [Google+](https://plus.google.com/114873431066202526630)
