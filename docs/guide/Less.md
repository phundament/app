This page describes the setup and usage of the package [crisu83/yii-less](https://github.com/Crisu83/yii-less).

**Note: It's recommended to use this package only on dev systems.**

## Requirements

* twitter/bootstrap (LESS source files)
* cloudhead/less.js (LESS compiler)
* [node.js](http://nodejs.org) *although you can get node.js via composer, it's recommended to install it via your system package manager* 

## Add Less Compiler

In order to make sure bootstrap and less.js to be included in your app,
update or install it with the `--dev` option on the command-line:

<code>php composer.phar update --dev</code>

Add the following to the `components` section of your `config/local.php`:

        'less'         => array(
            'class'        => 'vendor.crisu83.yii-less.components.LessServerCompiler',
            'files'        => array(
                // register files here or in your in the layout
                'themes/frontend/less/p3.less' => 'themes/frontend/css/p3.css',
                '../app/themes/backend2/less/backend.less'  => '../app/themes/backend2/css/backend.css',
            ),
            //'forceCompile' => true,
            'nodePath'     => '/opt/local/bin/node',
            'compilerPath' => $applicationDirectory . '/../vendor/cloudhead/less.js/bin/lessc',
        ),

Set write permissions:

    app/yiic less-setup

Make your application run the LESS compiler by preloading it:

    'preload' => array(
        'less', // uncomment to enable LESS compiler, or setup in main-local.php
    ),

> Note: The LESS compiler 1.1.2 and above supports detection of changes on any imported file.
> Note: Watch your Bootstrap version! Eventually version-fixes can be made in the `composer.json`.


### Customize

Update `www/themes/frontend/less/p3.less` and `www/themes/frontend/less/variables.less`. 

> Hint: Enable a `bootswatch` theme by uncommenting the imports.


### Additional Ressources

* [yii-less README](https://github.com/Crisu83/yii-less/blob/master/README.md)