You should [[Setup]] your Application first.

## Initialize a project repository

From a [downloaded](https://github.com/phundament/app/tags) and installed version of Phundament 3.

    git init
    git add -A
    git commit
    git remote add origin <url>
    git push -u origin master

The default setting should ignore server and user-generated content, but depending on your app setup you may have to adjust your `.gitignore` file.

The `vendor` folder is ignored by default, see the [[Packages]] section for more information how to develop with the source-code you get from composer.

Some folders, like `/app/runtime/`, have their own `.gitignore` file which ignores any file except themselves in the folders they're in.

## Clone the project

    git clone https://myrepo.url/phundament-app
    cd phundament-app/
    cp app/config/local-dist.php app/config/local.php
    php composer.phar install --dev --prefer-source

On a production system replace the last command with

    php composer.phar install --prefer-dist

## Keeping /vendor up-to-date

     git pull
     php composer.phar install

The `install` command always installs the versions specified in the `composer.lock` file.