Creating Yii applications with composer
=======================================

When creating web-application projects, you can add a great variety of different extensions, moduels, plugins or scripts to your code-base. But maintaining a stable combination and updating certain packages can become a hard task.

Luckily there are tools to handle the dependency management for you, like [composer](http://getcomposer.org) - which will be the package manager for Yii 2 - but this tutorial shows the integration of composer with Yii 1.1.

## Prepare Application

Before you start creating our Yii application with composer you have to do some preparation:

 * download composer
 * create `composer.json` file
 * create a class to handle composer callbacks    
 * create `config/console.php`

While some of the details are described in the following paragraphs, you can download the example source-code from [Phundament 3 yii-webapp branch](https://github.com/phundament/app/tree/yii-webapp).

### Composer Setup

Before using composer to retrieve packages for your application you have to adjust some values in `composer.json`.

#### Repository

Since Yii is not available via the standard packagist repository yet, disable the packagist repo for now and use the Phundament package repository, which has Yii framework and other Yii extensions available as a package.

    "repositories": [
    {
        "packagist": false
    },{
        "type":"composer",
        "url": "http://packages.phundament.com"
    }
    ],

#### Packages

If you want to create a basic Yii web application i.e., just add `yiisoft/yii` to your requirements.

    "require": {
        "php": ">=5.3.2",
        "yiisoft/yii": "1.1.*",
        "yiiext/migrate-command": "0.7.1.1"
    },
    
*Note: because you'll have to manage migrations in different locations later on, also add the extension `migrate-command`.*


#### Callbacks

You can use composer scripts to invoke Yii commands, first add some script hooks and an autoloading section for the callback class to `composer.json`.

    "autoload": {
        "psr-0": {
            "config": "./"
        }
    },
    "scripts": {
        "pre-install-cmd": "config\\ComposerCallback::preInstall",
        "post-install-cmd": "config\\ComposerCallback::postInstall",
        "pre-update-cmd": "config\\ComposerCallback::preUpdate",
        "post-update-cmd": "config\\ComposerCallback::postUpdate",
        "post-package-install": ["config\\ComposerCallback::postPackageInstall"],
        "post-package-update": ["config\\ComposerCallback::postPackageUpdate"]
    }
    
Hooks can be configured in `config/console.php` as a parameter `composer.callbacks`.
For details about the callback class, see its [source-code](https://github.com/phundament/app/blob/yii-webapp/protected/config/ComposerCallback.php).

### Yii Configuration

Now register specific callbacks, i.e. for Yii register a callback by the naming schema `[vendor]/[package]-[action]`, which triggers the creation of a standard web application skeleton.

    'params' => array(
        'composer.callbacks' => array(
            // args for Yii command runner
            'yiisoft/yii-install' => array('yiic', 'webapp', dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'),
            'post-update' => array('yiic', 'migrate'),
            'post-install' => array('yiic', 'migrate'),
        ),
    ),

*Note: There are callbacks for post-processing an update or install command. In this case, we've already registered the extended migrate command to run after install or update.*

Now you're good to go and can start the installation with

    php composer.phar install
    
Composer will now fetch the packages from `composer.json` and because you've registered a callback for `yiisoft/yii-install` it will not only download the code, but also invoke `yiic` and create a standard web application skeleton at the given location.



## Extend Your Application

With the Phundament package repository you can already find some more ready to use extensions for your app. As an example you can add the popular `yii-user` extension.

To install an extension configure the extension first.

### Configure

Adjust your configuration `config/main.php` and `config/console.php` according to the [README](https://github.com/mishamx/yii-user/blob/master/README.md) instructions.

Add the module,

	'modules'=>array(
        'user'=>array(
            'class' => 'application.vendor.mishamx.yii-user.UserModule',
        ),
	),

update the database component (needed by yii-user)

	'db'=>array(
    	'tablePrefix' => 'app_',
	),


an update the migrate command (console.php only).
	
    'commandMap' => array(
        'migrate' => array(
            'modulePaths' => array(
                'user' => 'application.vendor.mishamx.yii-user.migrations',
            ),
        )
    )	
	
### Require

Now you can add the package to your application with

    php composer.phar require mishamx/yii-user
    
After the install process composer will trigger the post-install callback which now invokes the needed database migrations.

You can now use the module here `http://yii-webapp/index.php?r=user`


## More…

Have a look at [Phundament 3 (master branch)](https://github.com/phundament/app) for a Yii application with preconfigured modules for user, rights and media-management and [add your own packages](https://github.com/phundament/app/wiki/Packages) to packages.phundament.com.

Give feedback and join the development!

Also available at [Yii Wiki](http://www.yiiframework.com/wiki/392/creating-yii-applications-with-composer/).