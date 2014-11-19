Extension Development
=====================

Building an extension
---------------------

- Open `Gii > Extension Generator`
- Enter values
- Click preview
- Click generate
- Follow instructions and push repo to GitHub
- Require via `composer`
- Happy coding...


Use Yii Framework 2.0 Development Repo
--------------------------------------

Change the extension `yiisoft/yii2` to `yiisoft/yii2-dev` in `composer.json`.

Run `composer update` to grab the development repo.

Re-create the orginal framwork folder and link the framework into it.
```
mkdir vendor/yiisoft/yii2
cd vendor/yiisoft/yii2
ln -s ../yii2-dev/framework/Yii.php .
```
