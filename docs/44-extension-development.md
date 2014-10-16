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

1. Change `yii2` to `yii2-dev` in `composer.json`.
2. `composer require twbs/bootstrap`
3. Link framework
```
cd vendor/yiisoft/yii2
ln -s ../yii2-dev/framework/Yii.php .
```