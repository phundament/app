Fixing extensions without modifying their code
==============================================

If you're working a lot with extensions you often stumble upon problems, when you want to include them into your custom web application, like hardcoded or absolute path aliases or classes extended from core application components, which implement addiditonal features.

Luckily Yii is a very flexible framework, and you can use mostly configuration settings to overcome these glitches introduced by external code.


Hardcoded Path Aliases
----------------------

Some extensions make pre-assumptions about the location they're installed in. As an example:

    // Publish extension assets
    $assets = Yii::app()->getAssetManager()->publish(
        Yii::getPathOfAlias('ext.myextension.assets')
    );
    
This extension assumes to be located directly under your extension directory, with a given name. But if it's not there, eg. you're using composer and it's located in your vendor directory under a different name, you can tell Yii to replace the full alias with another path.

So in this case you can add the following lines to your `config/main.php` under `aliases`:

    'ext.myextension.assets' => 'vendor.my.extension.assets',
    
The path will be resolved to its correct location without touching the extension code.

**Note: You can't define a partial alias, you'll always have to map the full string.**


Extended core application components
------------------------------------

As an example, if you want to use the very popular extensions `yii-user` from mishamx and `yii-rights` from crisu83 together you run into the problem, that both modules use a custom class extended from `CWebUser`.

While one module needs the methods from the other and vice-versa, you'll get errors when using the same user class in your application.

Although you may decide to implement your of version of CWebUser, you can use - in this case - the original `RWebUser` class from yii-rights and attach the features of `WebUser` from yii-user to it with a behavior.

[The behavior](https://github.com/schmunk42/web-user-behavior/blob/master/WebUserBehavior.php) is more or less the same code as [WebUser](https://github.com/mishamx/yii-user/blob/master/components/WebUser.php), except for `$this` was replaced with `$this->owner`.

Now you can attach this behavior to your `config/main.php` by configuring the user component like: 

        'user' => array(
            'class' => 'RWebUser',
            'behaviors' => array(
                'application.vendor.schmunk42.web-user-behavior.WebUserBehavior'),
        ),
        
Since the methods from WebUser are now available for RWebUser you can user the same class in both modules.

**Note: This way is not possible for all cases, you can not override existing methods with a behavior, eg. `yii-rights` overrides checkAccess() and other methods of CWebUser.**

------------

*These techniques are used in [Phundament](http://phundament.com) to ensure compatibility and minimize additional maintainance and complexity.*

-- https://github.com/phundament/app/wiki/Extensions