Get it!
-------

[Download](https://github.com/phundament/app/tags) and extract the latest version from github.

> Hint: Activate the [git hook](https://github.com/phundament/app/tree/master/git-hooks/post-merge) for `post-merge` operations, it will tell you when you have to run `composer.phar install`

**It's recommended to do the virtual host and basic setup before running `php composer.phar create-project` for the first time.**

Setup a virtual host
--------------------

    <VirtualHost *:80>
        DocumentRoot "/path/to/phundament-app/www"
        ServerName phundament.local
    </VirtualHost>

Update `/etc/hosts`.

    127.0.0.1	phundament.local

> Note: Although it's not required for testing, for new projects we advice you to create a virtual host and enable SEO-friendly URLs from the start on.


Adjust your application configuration
-------------------------------------

### Basic Application Settings

Start a new project by adjusting some very basic config settings in `app/config/main.php`.


#### Name and Language

 * change the application `name => "My Website"`
 * change the application `language => "de"`

#### Database Credentials

> Note: No setup needed for default SQLite database.

  * update `components => db` 

#### SEO-friendly URLs

> Note: Only available with Apache mod_rewrite

 * `mv www/_.htaccess www/.htaccess`
 * set `components => urlManager => urlFormat => "path"`
 * set `components => urlManager => showScriptName => false`

> Hint: See [TDGtY - Applications](http://www.yiiframework.com/doc/guide/1.1/en/basics.application) for details about configuring.


Next step...
------------

Continue to [[Installation]]


***

### Development Application Settings

`config/main-development.php`

  * enable/uncomment [[LESS]] compiler in `preload => less`, `components => less`
  * update log routing

`config/console.php`

  * update `rsync` settings

`php.ini`

  * `memory_limit` ~ `64M` (due to image resizing)

### Debug Application Settings

`config/main.php`

  * set `components => assetManager => linkAssets => true`

  
### XAMPP: Virtual Host Setup

```
<VirtualHost *:80>
    DocumentRoot "C:\path\to\app\www"
    ServerName phundament.local
    <Directory "C:\path\to\app\www">
        AllowOverride None
        Order Allow,Deny
        Allow from all
        Require all granted
    </Directory>    
</VirtualHost>
```