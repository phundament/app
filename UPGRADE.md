Phundament 
==========

If you want to upgrade your Phundament Application, adjust the version constraints in `composer.json` and follow this 
document, if you're experiencing problems.


Upgrade Guide
-------------

### Upgrading from 0.21.x

> Note: Version 0.22 introduced major database schema changes for p3media/widgets/pages.
But you can revert these changes and migrate down if you want to. The affected tables will only be renamed.

#### `main-local.php`

This file has to be created, either by the webapp command or by renaming your current `local.php`. [Issue 93](https://github.com/phundament/app/issues/93)

#### `main.php`

##### aliases

        'bootstrap' => 'vendor.clevertech.yiibooster.src',
        
##### imports

        'vendor.phundament.p3extensions.widgets.ckeditor.*', // shared classes
        'vendor.sammaye.auditrail2.models.*',
        'vendor.clevertech.yiibooster.src.widgets.*', // Bootstrap UI

##### copmponents

         'bootstrap' => array(
            'class' => 'vendor.clevertech.yiibooster.src.components.Bootstrap', // assuming you extracted bootstrap under extensions
            'coreCss' => true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
            'responsiveCss' => false, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
            'fontAwesomeCss' => true, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false

#### `console.php`

        'auditrail'      => 'vendor.sammaye.auditrail2.migrations',

#### `index.php`

    require_once(dirname(__FILE__).'/../vendor/autoload.php');
    
#### Database

    app/yiic migrate

#### API and model attributes updates

* nameId => name_id
* t('seoUrl') => url_param
* parent => getParent    
* P3MetaDataBehavior::SUPERUSER_ROLE => PhAccessBehavior::SUPERUSER_ROLE
* P3Page::getActivePage()->t('description') => P3Page::getActivePage()->description
* P3Page::getActivePage()->p3PageMeta->checkAccessCreate => P3Page::getActivePage()->access_append
* P3Media.mimeType => P3Media.mime_type


### Upgrading from 0.15.x-0.20.x


#### `composer.json`

        "yiisoft/yii":"1.1.14",

        "phundament/backend-theme":"@dev",
        "phundament/jquery-file-upload": "@dev",
        "phundament/p3admin":"dev-master as 0.16.0",
        "phundament/p3extensions":"dev-develop as 0.17.0",
        "phundament/p3bootstrap":"dev-develop as 0.22.0",
        "phundament/p3pages":"dev-release/0.17.0 as 0.17.0",
        "phundament/p3media":"dev-develop as 0.16.0",
        "phundament/p3widgets":"dev-develop as 0.16.0",


#### `console.php`

##### migration modules

        'auditrail' => 'vendor.sammaye.auditrail2.migrations',

##### composer callbacks

        'backend-theme' => array(
            'class'           => 'vendor.phundament.backend-theme.commands.PhBackendThemeCommand',
            'themePath'       => 'application.themes',
        ),


#### `main.php`

##### aliases

        'bootstrap' => 'vendor.clevertech.yiibooster.src',

##### imports        
        
        'vendor.phundament.p3extensions.widgets.ckeditor.*', // shared classes
        'vendor.sammaye.auditrail2.models.*',
        'vendor.clevertech.yiibooster.src.widgets.*', // Bootstrap UI

##### copmponents

         'bootstrap' => array(
            'class' => 'vendor.clevertech.yiibooster.src.components.Bootstrap', // assuming you extracted bootstrap under extensions
            'coreCss' => true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
            'responsiveCss' => false, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
            'fontAwesomeCss' => true, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false

##### params

        'languages' => array(
            'de_de' => 'Deutschland',
            'de_at' => 'Österreich',
            'de_ch' => 'Schweiz',
        ),

> Note: Also set console application language


#### `index.php`

    require_once(dirname(__FILE__).'/../vendor/autoload.php');


#### Database

    app/yiic migrate


#### Model attributes

Replace/rename the attributes in your application.

* nameId => name_id
* t('seoUrl') => url_param
* parent => getParent


See `config/main.php` in [DIFF from 0.20.6 to 0.21.0-dev](https://github.com/phundament/app/compare/933052f2c8d424aa388a0c4f7355e17d7e1d8ce7...a23288ba1860a262dcc880562c5bc4cb8d557032)

### Upgrading from 0.14.x

 * update your copy of `app/themes/frontend/views/layouts/_menu.php`
   * see `vendor/phundament/themes/p3bootstrap/layouts/_menu.php`
   * Note: running `app/yiic p3bootstrap` may overwrite your exiting changes

`composer.json`
 * for applications which should not be updated, edit the version constraint for `"phundament/p3extensions": "0.8.*"` 

### Upgrading from 0.13.x

`config/main.php`
 * Define a `vendor` and a `root` alias (see [here](https://github.com/phundament/app/blob/f589475f5a4d57c9c938b8130a6f0e154c2732be/app/config/main.php#L26) 
   for a root alias example)
 * Use only `vendor` alias, not `application.vendor` anymore.

### Upgrading from 0.12.x

`composer.json`

        "cloudhead/less.js": "1.3.*",
        
        "minimum-stability": "dev",

### Upgrading from 0.11.x

`composer.json`

        "mishamx/yii-user": "@dev",
        "schmunk42/web-user-behavior":"*",

`config/main.php`

`aliases`

        // hardcoded path fixes for some extensions
        'application.modules.user.views.asset' => 'vendor.mishamx.yii-user.views.asset',
        'application.modules.user.components' => 'vendor.mishamx.yii-user.components',
        'ext.editable.assets.js.locales' => 'vendor.vitalets.yii-bootstrap-editable.assets.js.locales',
        'ext.editable.assets' => 'vendor.vitalets.yii-bootstrap-editable.assets',
        'echosen' => 'vendor.ifdattic.echosen',
        'echosen.EChosen' => 'vendor.ifdattic.echosen.EChosen',
        'ext.EChosen' => 'vendor.ifdattic.echosen',

`components`

        'user' => array(
            'behaviors' => array('application.vendor.schmunk42.web-user-behavior.WebUserBehavior'), // compatibility behavior for yii-user and yii-rights
        ),

`blueimp/jquery-file-upload` replaces the former fork from `phundament/jquery-file-upload`.

### Upgrading from 0.10.x

Shell

`./yiic p3bootstrap`

`config/main.php`

        'p3pages' => array(
            'class' => 'vendor.phundament.p3pages.P3PagesModule',
            'params' => array(
                'availableLayouts' => array(
                    '//layouts/main' => 'Main Layout',
                    '_TbNavbar' => '_TbNavbar (Top-Menu Container)'
                ),
                'availableViews' => array(
                    '//p3pages/column1' => 'One Column',
                    '//p3pages/column2' => 'Two Columns',
                )
            ),
        ),

        'rights' => array(
            'class' => 'application.vendor.crisu83.yii-rights.RightsModule',
            'cssFile' => '/themes/backend/css/yii-rights.css'
        ),
        
`p3admin`

        'p3admin' => array(
            'components' => array(
                'metadata' => array(
                    'class' => 'vendor.phundament.p3admin.components.Metadata',
                )
            )
        ),
        
`rights`

        'rights' => array(
            'cssFile' => '/themes/backend/css/yii-rights.css'
        ),        

### Upgrading from 0.9.x

`composer.json`

`"require"`

        "crisu83/yii-rights": "@dev",
        "mishamx/yii-user": "dev-master as 0.3.999",
        "yiiext/migrate-command": "@dev",
        "vitalets/yii-bootstrap-editable": "dev-master as 1.0",
        "phundament/jquery-file-upload": "dev-master as 0.0.1"

`"require-dev"`

        "phundament/lessii": "master@dev",
        "crisu83/yii-less": "dev-tip as 0.0.1"        

Legacy package repository for 0.9.x versions: `http://packages.phundament.com/0.9/`


### Upgrading from 0.8.x

#### config/console.php

`composer.callbacks`

     'phundament/p3admin-install' => array('yiic', 'p3webapp', 'create', realpath(dirname(__FILE__) . '/..'), 'git', '--interactive=0'),
     
### Upgrading from 0.7.x

#### config/main.php

`import`
    
    'application.vendor.vitalets.yii-bootstrap-editable.*', // p3media

Extension used in p3media-0.8.

`modules.p3media.presets`

    'p3media-manager' => array(
        'commands' => array(
            'resize' => array(300, 200),
        ),
        'type' => 'png'
    ),

Preset used in manager view in p3media-0.8
