URLs
----

All URLs should be prepended with `http://phundament.local` or `http://phundament.local/index.php?r=` depending on your `.htaccess` settings.

| Page | URL |
| --- | --- |
| Index | `/` |
| Admin | `/admin` |
| Login | `/user/login` |
| Code Generator | `/gii` |
| Registration | `/user/registration` |
| Forgot Password | `/user/recovery/recovery` |
| Page | `/<language>/<SEO-Name>-<ID>.html` |
| Media files | `/img/<preset>/<SEO-Title>_<ID>.<ext>` |

URL rules can be defined in `config/main.php`

Console
-------

| Command |  |
| ------- | --- |
| `composer.phar create-project phundament/app` | build a new Phundament project
| `composer.phar install` | synchronize dependencies in `/vendor` with lock-file
| `composer.phar require --no-update foo/bar` <br/> `composer.phar update foo/bar` | require a new package, but don't update the whole application
| `composer.phar update` | update **all** dependencies in /vendor
| `app/yiic migrate` | update database
| `app/yiic database` | create database migrations from application data
| `app/yiic rsync production local p3media` | synchronize media files (eg. user uploads)
| `app/yiic less-setup` | set permissions on css output folders
| `git pull` | update source-code (application)
| `php /opt/apigen/apigen.php` | generate API documentation (class reference)
| `php vendor/schmunk42/giic/giic.php giic generate application.config` | generate CRUDs with [giic](https://github.com/schmunk42/giic)


File Structure
--------------

```text
+ apigen.neon                           generate documentation
+ app                                   project directory
|    + commands                         CLI commands
|    + components                       project components
|    + config                           configuration
|    |    - console-local.php           configuration local CLI
|    |    - console.php                 configuration CLI 
|    |    - main-development.php        configuration web development 
|    |    - main-local.php              configuration web 
|    |    - main-production.php         configuration web production
|    |    - main.php                    configuration configuration
|    |    - test.php                    configuration test 
|    + controllers                      project controllers
|    + data
|    |    - default.db                  user-data application SQLite database
|    |    + p3media                     user-data media files registered in database
|    |    + p3media-import              user-data files for local import scan
|    + messages                         project translations
|    + migrations                       project database setup
|    + models                           project models
|    + runtime                          server-data
|    + tests                            project tests
|    + themes                           project themes
|    |    + backend2                    project backend views, LESS, css
|    |    |    + views                  
|    |    |         + skins             configuration widget properties (default skin)
|    |    + frontend                    project frontend views, LESS, css
|    + yiic                             CLI
- codeception.yml                       configuration test-suite
- composer.json                         packages (required)
- composer.lock                         packages (installed)
- composer.phar                         packages dependency manager
+ git-hooks
|    - post-merge                       packages integrity hook
+ src                                   Phundament's Yii + composer "magic"
+ vendor                                packages source-code
+ www                                   public files
    - .htaccess                         configuration web-server
    + assets                            server-data
    - favicon.ico
    + images        
    - index-test.php                    project test entry script
    - index.php                         project main entry script
    - robots.txt                        project SEO instructions
    + runtime                           server-data
    - sitemap.xml                       project SEO instructions
```


---

### Developers

#### Create a bleeding-egde clone with git
```
git clone -bdevelop https://github.com/phundament/app.git app-develop
cd app-develop
php composer.phar create-project
```

#### Create full project with source-code repositories and developemnt packages
`composer.phar -sstable --prefer-source --dev create-project phundament/app my-app-development`

#### Quick bleeding-egde create project
`composer.phar -sdev --prefer-dist --no-dev create-project phundament/app my-app-testdrive`

>Note: For commands starting with `composer.phar` it is assumed, that you have a global composer installation.
