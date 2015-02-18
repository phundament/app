Extensions
==========

It is very easy to extend a Phundament-based application with existing composer packages. You can integrate any Yii2 
extension or PHP library into Phundament 4.

For a quick start, let's install a package browser and a markdown renderer module.

    composer require schmunk42/yii2-packaii:dev-master schmunk42/yii2-markdocs-module:@stable

Uncomment the config for the modules in `config/main.php`.

Finding packages
----------------

Start with a search on [Packagist](https://packagist.org) or from your command line

```
composer search -N "yii2-auth"
composer search -N "yii2-excel"
```

Installing packages
-------------------

To install an extension simply require it in your `composer.json` with the following command

    composer require vendor/package
    
> Make sure to commit your `composer.lock` file, so your co-developers get the exact same version.     
  
Configuring packages
--------------------

How to configure a package depends on the package and it's type. In general you can follow Yii's rules for application
module and component configuration.
  
  
Show installed packages
-----------------------

    composer show --installed

---

Continue to the [advanced development](40-develop.md) section 