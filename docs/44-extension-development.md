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


```
 ./yii gii/extension \
     --vendorName=you \
     --packageName=yii2-new-module \
     --namespace=you\\new\\ \
     --license=BSD-3-Clause \
     --title="A new Yii 2.0 module" \
     --description="Enter some useful text here..." \
     --authorName="Your Name" \
     --authorEmail=you@example.com
```

[Create a GitHub repository](https://github.com/new)

```
cd runtime/tmp-extensions/yii2-new-module
git init
git add -A
git commit -m "initial commit"
git remote add origin https://github.com/you/yii2-new-module.git
git push -u origin master
```

[Submit to packagist](https://packagist.org/packages/submit) ... wait or add repository manually to `composer.json`.

```
composer require you/yii2-new-module
```



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
