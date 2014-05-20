## Using composer from Phundament

[[Setup]] the application in advance, eg. if you want to use a MySQL database.

You start the installation with:

`php composer.phar create-project`

This command installs the packages specified in `composer.lock`.
Run 

`app/yiic migrate`

afterwards to compolete the database setup.

### Environment configuration settings

Upon installation you'll be asked to create local configuration files and to choose an environment.

There are several config settings dependent on your current environment, e.g. a [[LESS]] compiler or error logging. You may also want to not store sensitive information in your repository, therefore you can use local config files, eg. `app/config/main-local.php`, which take precedence of your main configuration file.

> Note: Those files are ignored in the `.gitingore` file by default.

### Use some demo data

You can enable the demo data migration during the installation process.

To manually add demo data, define the migration module in `app/config/console-local.php`. And run `app/yiic migrate` to apply the migration.


### What the installation does


The current installation process will do the following things for you:

 * download the packages
 * trigger commands
   * to setup the application
   * to setup the media manager
   * to copy the themes to the right place
 * informs you tho setup the database {[[Migrations]])
   * insert the admin credentials (username, email, password) into the database
     * **(!) choose a strong admin password (!)**


 

Next step...
------------

Continue with [[Content Management]]...

***

### Alternative: Using global composer installation

Create a system wide installation of composer, see [composer docs](http://getcomposer.org/doc/00-intro.md) for details.

    curl -s https://getcomposer.org/installer | php -- --install-dir=/opt/bin

Create a phundament/app project

    composer.phar create-project phundament/app

> Hint! Use an shell alias like
> `alias p3="composer.phar create-project --repository-url='http://packages.phundament.com' phundament/app"`
> to create new projects with `p3 my-new-project` instantly.

> Note: Don't run migrations on first install, if you want to switch the database connection. Install, update your config and run `yiic migrate` afterwards.


### Installation: Options

Recommended for development systems:

 * `--dev` installs development packages, eg. less-compiler and twitter/bootstrap source files
 * `--prefer-source` gets ready to use repositories, useful when you're actively developing [[Packages]]

Recommended for production systems:

 * `--no-dev` without development packages (test-suite, LESS compiler)
 * `--prefer-dist` downloads archives, no git or hg needed
 
 > Hint: See also the [[FAQ]] and [[Cheat-Sheet]]

