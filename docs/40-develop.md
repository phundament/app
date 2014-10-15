Development
===========

I18N
----

Messages for Translations
```
tbd
```

Testing
-------

Install required packages and build test classes
```
./yii app/setup-tests
```

Run all suites in all applications
```
./yii app/run-tests
```

Generating Documentation
------------------------

Install required packages
```
./yii app/setup-docs
```

Generate application documentation to `docs-html`
```
./yii app/generate-docs
```

Generating CRUDs
----------------

```
./yii giiant-batch -tables=table1,table2,table3,table4
```

Use Yii Framework 2.0 Development Repo
--------------------------------------

1. Change `yii2` to `yii2-dev` in `composer.json`.
2. `composer require twbs/bootstrap`
3. Update `index.php`
   ```
   require(__DIR__ . '/../../vendor/yiisoft/yii2-dev/framework/Yii.php');
   ```


