Code Generation
===============

Backend CRUD module
-------------------

Phundament allows you to use you custom designed database schema as the base for CRUD admin interfaces.
To kickstart you application backend create a new `crud` module with Yii's built-in tools

> If you would like to create an extension module in a composer package, please start by [creating an extension](44-extension-development.md) first
> push it to your repo and install it with `composer require --prefer-source name/package`. 
> Afterwards generate your code directly into `vendor/name/package` and use this repository for development.

```
./yii gii/module \
    --moduleID=crud \
    --moduleClass=app\\modules\\crud\\Module
```

and add it to your application config

```
    'modules'    => [
        'crud'    => [
            'class'  => 'app\modules\crud\Module',
            'layout' => '@admin-views/layouts/main',
        ],
    ]
```

create the backend CRUDs with gii and Giiant

```
./yii giiant-batch \
  --interactive=0 \
  --overwrite=1 \
  --modelDb=dbSakila \
  --modelBaseClass=app\\models\\SakilaActiveRecord \
  --modelNamespace=app\\models\\sakila \
  --crudControllerNamespace=app\\modules\\crud\\controllers \
  --crudViewPath=@app/modules/crud/views \
  --crudPathPrefix= \
  --tables=actor,address,category,city,country,customer,film,film_actor,film_category,film_text,inventory,language,payment,rental,staff,store
```

See [Giiant documentation](https://github.com/schmunk42/yii2-giiant/blob/master/README.md) for an [example with Sakila demo database](https://github.com/schmunk42/yii2-giiant/blob/master/docs/generate-sakila-backend.md).

I18N
----

Messages for Translations

tbd

HTML-Documentation
------------------

Install required packages

```
./yii app/setup-docs
```

Generate application documentation to `docs-html`

```
./yii app/generate-docs
```


