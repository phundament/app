PaaS
====

> NOTE! This section is under development

Appsdeck
--------

- Make sure to have your application in a git repository
- Register and setup account at [appsdeck](https://appsdeck.eu/home/apps)
- `Create App` on Appsdeck
- Under `Addons` add a *MySQL* database
- Update `Environment`, make sure to fill in the values for `DATABASE_...` taken from `APPSDECK_MYSQL_URL`

```
ADMIN_EMAIL: phundament-appsdeck@phundament.local
APPSDECK_MYSQL_URL: mysql://USER:PASS@HOST:PORT/DB
DATABASE_DSN: mysql:host=HOST;port=PORT;dbname=DB
DATABASE_PASSWORD: PASS
DATABASE_USER: USER
APP_SUPPORT_EMAIL: phundament-appsdeck@phundament.local
YII_DEBUG: 0
YII_ENV: prod
```

Update local `composer.json` file:

    "extra": {
        "paas": {
            "document-root": "frontend/web",
            "index-document": "index.php",
            "compile": [
                "vendor/composer/bin/composer.phar global require 'fxp/composer-asset-plugin:1.0.0-beta3'",
                "vendor/composer/bin/composer.phar install --no-dev",
                "./yii app/setup --interactive=0"
            ]
        }
    }

Setup git remote and push:

```
git remote add appsdeck git@appsdeck.eu:PROJECT.git
git push appsdeck master
```

