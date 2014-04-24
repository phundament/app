Require a package
-----------------

`php composer.phar require vendor/package`

Add a package
-------------

Got a yii-extension which you want to install via composer? [Submit a yiingle](http://phundament.com/yiingles/default/submit)!

*Note: yiingles can also point to github and bitbucket repositories without a `composer.json` file.*

### Manually add a package

Follow [this How-To](http://www.andrew-kirkpatrick.com/2012/10/add-a-git-repository-as-a-package-using-composer-for-php/) from andrew-kirkpatrick.com.

Fork a Package
--------------

If you've found a bug in a package or want to add a new feature, you can use the following workflow to easily create a pull request from within your application.

 * Fork package on github
 * Locate the package in your app you want to update, check if you've cloned a repo (not downloaded a zip)
  * if not remove the folder from ./vendor, get the packages with `php composer.phar install --prefer-source` to get repositories.
 * `cd vendor/owner/package`
 * `git branch patch-NAME-OF-THE-PATCH`
 * `git checkout patch-NAME-OF-THE-PATCH` 
 * *coding*
 * `git commit`
 * `git push https://github.com/my-vendor/forked-package patch-NAME-OF-THE-PATCH`
 * create a github pull request to the original repo

See also the [composer docs](http://getcomposer.org/doc/05-repositories.md#vcs).


Replace a package
-----------------

If you need your patch now and can not wait until the package maintainer includes the patch and releases a new version. You can override the original package with your repository and point to a specific commit which contains your modifications.

Add your fork to `composer.json`:

    },
    "repositories":[
        {
            "type":"package",
            "package":{
                "name":"mishamx/yii-user",
                "version":"master",
                "source":{
                    "url":"https://github.com/YOUR-VENDOR-NAME/yii-user.git",
                    "type":"git",
                    "reference":"c0a9a9fbe6c2d86cdf8eb067b87a512c9053f9e6"
                }
            }
        },
        {
            "type":"composer",
            "url":"http://packages.phundament.com"
        }
    ],

Note: `"reference":"c0a9a9fbe6c2d86cdf8eb067b87a512c9053f9e6"` is the commit hash of your patch.

(Re)move the package you want to replace and run `composer.phar update`.


### Helpful commands

Lists all available packages:

`php composer.phar show`

Show details about a packages:

`composer.phar show vendor/package`

Show available updates:

`composer.phar update --dry-run`

Require a package in your application:

`composer.phar require vendor/package`


### Background information
 * http://de.slideshare.net/rdohms/composer-putting-dependencies-on-the-score
 * [Local Packages I](http://marekkalnik.tumblr.com/post/22929686367/composer-installing-package-from-local-git-repository)
 * [Local Packages II](https://groups.google.com/forum/?fromgroups=#!topic/composer-dev/P2ikrm_DFmc)