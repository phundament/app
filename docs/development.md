Development
===========

Conventions
-----------

- composer.phar is available via `composer`

Use Yii Framework 2.0 Development Repo
--------------------------------------

1. Change `yii2` to `yii2-dev` in `composer.json`.
2. `composer require twbs/bootstrap`
3. Update `index.php`
   ```
   require(__DIR__ . '/../../vendor/yiisoft/yii2-dev/framework/Yii.php');
   ```


