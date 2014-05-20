What is Phundament?
-------------------
Phundament is a solid, highly customizable universal PHP application foundation built with composer upon Yii Framework and Yii Extensions.

It's goal is the seamless integration of open-source extensions and libraries bundled in composer packages.

Although it may look to you like a CMS in the first place, Phundament is much more than that.
It follows strictly a very modular approach for combining and configuring extensions into an application.

You can customize Phundament to be any application you want. The standard [App](https://github.com/phundament/app) features popular Yii extensions such as user, rights, yiiext, yii-bootstrap, ckeditor, yii-less, p3widgets and p3media and also provides libraries such as less.js and twitter bootstrap for example.

Have a look at our [Package Repository](http://phundament.com/en/packages-12.html) with over 100 packages available already including most of the best rated and widely used Yii Extensions.


`phundament/app` the standard boilerplate
-----------------------------------------

* `/` - description files for package management, doc generation, testing and basic documentation
* `src` - the one 'magic' file which manages the integration of Yii into the composer process
* `app` - the application code, aka. "protected"
* `www` - the public files, like entry-script, CSS and JS
* `vendor` - the extension packages, managed by composer

More details can be found in the [[Cheat Sheet]].

Your custom Application Boilerplate
-----------------------------------

[Just Fork Phundament](https://github.com/phundament/app/fork_select) and update your packages in `composer.json` or by running `composer.phar require vendor/package` to fit your needs, for sure you also have to update `config/main.php` if you include new components, widgets, modules or commands.

If you want to try a more vanilla version and build your app from scratch, try the [yii-webapp branch](https://github.com/phundament/app/tree/yii-webapp).



How it works?
-------------
 * the installer retrieves the packages specified in [`composer.lock`](https://github.com/phundament/app/blob/master/composer.lock)
 * executes the `composer.callbacks` from [`config/console.php`](https://github.com/phundament/app/blob/master/config/console.php)
 * the web-application is pre-configured in [`config/main.php`](https://github.com/phundament/app/blob/master/config/main.php)

For more details see [[How-it-works]] and [[Internals]].


### Next...

Check the [[Requirements]].