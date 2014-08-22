Generating Documentation
========================

Requirements
------------

```
composer require yiisoft/yii2-apidoc:"*"
```

Guide
-----

```
php -dmemory_limit=1G vendor/yiisoft/yii2-apidoc/apidoc \
  guide --exclude=tmp-extensions \
  docs/ docs-html
```
```
open docs-html/guide-index.html
```

API - Class Reference
---------------------

```
php -dmemory_limit=1G vendor/yiisoft/yii2-apidoc/apidoc \
  api --exclude=tmp-extensions,tests \
  app,vendor/schmunk42,vendor/2amigos _html
```

```
open docs-html/index.html
```
