Phundament 3 App
================

Upgrade Guide
-------------

### Upgrading from v0.14.x

 * update your copy of `app/themes/frontend/layouts/_menu.php`
   * see `vendor/phundament/themes/p3bootstrap/layouts/_menu.php`
   * Note: running `app/yiic p3bootstrap` may overwrite your exiting changes

### Upgrading from v0.13.x

`config/main.php`
 * Define a `vendor` and a `root` alias.
 * Use only `vendor` alias, not `application.vendor` anymore.

### Upgrading from v0.12.x

`composer.json`

        "cloudhead/less.js": "1.3.*",
        
        "minimum-stability": "dev",

### Upgrading from v0.11.x

`composer.json`

        "mishamx/yii-user": "@dev",
        "schmunk42/web-user-behavior":"*",

`config/main.php`

`aliases`

        // yii-user path fixes
        'application.modules.user.views.asset' => 'application.vendor.mishamx.yii-user.views.asset',
        'application.modules.user.components' => 'application.vendor.mishamx.yii-user.components',
        'ext.editable.assets.js.locales' => 'application.vendor.vitalets.yii-bootstrap-editable.assets.js.locales',
        'ext.editable.assets' => 'application.vendor.vitalets.yii-bootstrap-editable.assets',
        'echosen' => 'vendor.ifdattic.echosen',
        'echosen.EChosen' => 'vendor.ifdattic.echosen.EChosen',
        'ext.EChosen' => 'vendor.ifdattic.echosen',

`components`

        'user' => array(
            'behaviors' => array('application.vendor.schmunk42.web-user-behavior.WebUserBehavior'), // compatibility behavior for yii-user and yii-rights
        ),

`blueimp/jquery-file-upload` replaces the former fork from `phundament/jquery-file-upload`.

### Upgrading from v0.10.x

Shell

`./yiic p3bootstrap`

`config/console.php`

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

### Upgrading from v0.9.x

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


### Upgrading from v0.8.x

#### config/console.php

`composer.callbacks`

     'phundament/p3admin-install' => array('yiic', 'p3webapp', 'create', realpath(dirname(__FILE__) . '/..'), 'git', '--interactive=0'),
     
### Upgrading from v0.7.x

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
