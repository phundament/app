Extension Development
=====================

If you plan to reuse functionality, it is recommended to provide the code in composer packages. Luckily, Yii 2.0 Framework is equipped with a code generator for creating ready to use extension skeletons in a minute.

> Note! Code generation is only available with `YII_ENV_DEV=true`.

Building an extension
---------------------

### Generating skeleton with Gii

To create an extension from the command line adjust the parameters in the following command and run it from your
project root.

```
 ./yii gii/extension \
     --vendorName=mycompany \
     --packageName=yii2-mypackage \
     --namespace=mycompany\\mypackage\\ \
     --license=BSD-3-Clause \
     --title="Extension for Yii 2.0 Framework" \
     --description="Provides cool stuff" \
     --authorName="Your Name" \
     --authorEmail=you@yourdomain.com
```

This will generate a folder in `runtime/tmp-extensions/yii2-mypackage` with example code for the extension.

### Make your extension available via composer

Create a new private or public repository, eg. on [GitHub](https://github.com/new).

Then, go to the folder with the generated code inside your project's `runtime` folder and initializie a temporary
Git repository

```
cd runtime/tmp-extensions/yii2-mypackage
git init
git add .
```

Check if you have added the correct files with

```
git status
```

It should show three files to be committed. If everything is fine commit and push your changes to your repo.

```
git commit -m "initial commit"
git remote add origin https://github.com/mycompany/yii2-mypackage.git
git push origin master
```

This is a one-time push from this repo, you should install your extension via composer now.

#### Private packages

If you are developing packages for a private repository you can enable your package by adding it's repository URL to `composer.json`

```
"repositories": [
{
  "type": "git",
  "url": "git@github.com:mycompany/yii2-mypackage.git"
},
```

> You should use the git protocol when using private repositories in conjunction with private-public-key authentication when
> deploying remotely or in a virtualized environment.

#### Public packages

To make your extension available publicly, [submit it to packagist](https://packagist.org/packages/submit).
 
It should be available after a few minutes, if you are heavily developing an extension you can still add it's repository 
manually to `composer.json`, like described above. Composer will then check the repository on every update and you'll
get always the latest commits.

### Install package

Now get the code in any Yii2 application with

```
composer require mycompany/yii2-mypackage:dev-master
```

Depending on your extension and its bootstrapping configuration you may have to configure it in the application configuration.
The classes from your package are available via auto-loading and accessible by their namespace. 

### Alternative: Using the Gii Web interface

You can also use the Gii web-interface and your favorite Git UI client to accomplish the tasks described above.

- Open `Gii > Extension Generator`
- Enter values
- Click preview
- Click generate
- Create Git repo, commit and push to repository
- Require via `composer`

---

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
