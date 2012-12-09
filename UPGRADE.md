Phundament 3 App
================

Upgrade Guide
-------------

### Upgrading from v0.9.x

`composer.json`

        "crisu83/yii-rights": "@dev",
        "mishamx/yii-user": "dev-master as 0.3.999",
        "yiiext/migrate-command": "@dev",
        "vitalets/yii-bootstrap-editable": "dev-master as 1.0",
        "phundament/jquery-file-upload": "dev-master as 0.0.1"



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