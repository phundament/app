Phundament 3 App
================

**Version 0.12.4**


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

Continue to the [Wiki](https://github.com/phundament/app/wiki)...

How it works?
-------------
 * the installer retrieves the packages specified in [`composer.lock`](https://github.com/phundament/app/blob/master/composer.lock)
 * executes the `composer.callbacks` from [`config/console.php`](https://github.com/phundament/app/blob/master/config/console.php)
 * the web-application is pre-configured in [`config/main.php`](https://github.com/phundament/app/blob/master/config/main.php)

More [details](https://github.com/phundament/app/wiki/How-it-works).


Try a demo
----------

### Open website

[Frontend Demo Page](http://demo.phundament.com/3.0-dev)

Login with `editor` / `editor` or register by e-mail.

### First Steps

For some usage examples, [click here](https://github.com/phundament/app/wiki/Content-Management).


* [Requirements](https://github.com/phundament/app/wiki/Requirements)


### License
 *  [BSD](https://github.com/phundament/app/blob/0.12.4/LICENSE)



Changelog
---------

 * [CHANGELOG](https://github.com/phundament/app/blob/0.12.4/CHANGELOG.md)
 * [Packages in Phundament 0.12.4](https://github.com/phundament/app/blob/0.12.4/composer.lock)


Resources
---------

### Basic
 *  [View at Yii Extensions](http://www.yiiframework.com/extension/phundament/)
 *  [Fork on github](https://github.com/phundament/app)
 *  [Report a bug](https://github.com/phundament/app/issues)
 *  [FAQ / Troubleshooting](https://github.com/schmunk42/phundament/wiki/FAQ)
 *  [Support](https://github.com/schmunk42/phundament/wiki/Support)

### Additional
 *  Extensions [packages.phundament.com](http://packages.phundament.com)
 *  [Wiki](https://github.com/schmunk42/phundament/wiki/)
 *  [Downloads](https://github.com/phundament/app/tags)
 *  [Phundament Website](http://phundament.com)
 *  [Company Website](http://herzogkommunikation.de)
 *  [Demo Website](http://demo.phundament.com/3.0-dev/)
 
### Social Networks
 *  [Twitter](http://twitter.com/#!/phundament)
 *  [Facebook](http://www.facebook.com/phundament)
 *  [Google+](https://plus.google.com/114873431066202526630)

### Contact
 *  phundament@usrbin.de
