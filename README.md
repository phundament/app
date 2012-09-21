Phundament 3 App
================

**[10.5.12] IMPORTANT NOTICE!**

We've changed or main repository and the way you
get Phundament 3, please read the updated documentation below.


What is Phundament?
-------------------

 1.  Not a CMS *for those developers who wouldn't read on otherwise ;)*
 2.  Yii Framework and package-based set of modules
 3.  Solid web application foundation

Phundament 3 is an application foundation built upon a set if independent Yii modules and extensions such as [user](http://www.yiiframework.com/extension/yii-user/), [rights](http://www.yiiframework.com/extension/rights/), [yiiext](http://code.google.com/p/yiiext/), [gtc](https://github.com/schmunk42/gii-template-collection), ckeditor, jquery-file-upload, p3widgets and p3media.

The combination of p3widgets and p3media provides basic content management system (CMS) features, like dynamic widget creation and file management.
Combined in ckeditor, p3media acts as a ckfinder plugin which gives you the full power of HTML and media files for content creation via p3widgets.

It comes with a very minimalistic setup which integrates perfectly into an Yii web application skeleton and installs with one single command.

Get Phundament 3 - the Yii Application Foundation with CMS features via composer.
For more details visit [phundament.com](http://phundament.com).


Try a demo
----------

[Demo Page](http://demo.phundament.com/3.0-dev)

Login with editor / editor


Get started
-----------

Download and extract the installer as ZIP or TAR.GZ file from a working tagged version here:

[Downloads](https://github.com/phundament/app/tags)

Enter the app root folder

```
cd phundament-app-SHA1
```

Get the packages with composer, note: if you want to install for MySQL, you have to update your config first.

```
php composer.phar install --dev
```

All setup, database, file permissions and config settings should be done automatically.
You may skip the --dev option on production systems, at the moment it just adds LESS support for your bootstrap-based themes.


First Steps
-----------

### Open website
http://localhost/phundament-app-<SHA1>

### First Steps
  * Login with admin/admin
  * Click on 'Upload'
  * Upload some images
  * Click on 'Widget Demo'
  * Hover container and click on '+'
  * Edit HTML, you can select from your uploaded images by clicking on 'Browse Server' in the image dialog.
  * Save widget



Troubleshooting
---------------

 * Make sure you have git (http://git-scm.com/) and hg (http://mercurial.selenic.com/) installed
 * zlib extension or unzip available on your PATH
 * OpenSSL Support enabled in PHP or try ```--prefer-source```
 * If you get SSL or memory limit errors, try: ```php -d allow_url_fopen=1 -d memory_limit=64M composer.phar -v update```
 * If you want to the very lastest version
   ```
   curl -L https://github.com/phundament/app/tarball/master | tar zx
   ```
 * Don't manually enable Yii-Logger on a fresh install



Requirements
------------

 *  PHP >5.3.2
 *  [Yii Framework Requirements] (http://www.yiiframework.com/doc/guide/1.1/en/quickstart.installation#requirements)
 *  git, hg (Mercurial), svn (subversion), php_mod_ssl
 *  ImageMagick or GDlib

### Tested Systems
 *  Mac OS X 10.6.8
 *  Debian 5,6
 *  Windows XP

### Supported Databases
 *  MySQL 5
 *  SQLite 3

### License
 *  BSD



Changelog
---------

### phundament/app

#### 0.7 (September 2012)

   [ENH] Installer Cleanup
   [ENH] Unified Configuration
*  [UPD] Refactored direcory structure

#### 0.6 (August/September 2012)

 * [UPD] Dependencies

#### 0.5 (May/June 2012)

 * [UPD] Big version bump to avoid further confusion

#### 0.1.x (May 2012)

 * [ENH] Installation scripts
 * [FIX] Package installation

#### 0.1 (April 2012)

The repository phundament/app introduces Phundament 3 installation via composer (http://getcomposer.org)

### schmunk42/phundament

#### 0.4 (April 2012)

#### 0.3.x (March 2012)

 * [FIX] P3 controller permissions
 * [UPD] updated demo content
 * [ENH] added Windows installer
 * [ENH] code cleanup

#### 0.3 (12.3.2012)
Bootstrapped it! Complete responsive design, completely editable with mobile devices. Added widget translation, updated migrations, templates. A whole bunch of other stuff (fixes, fixes, fixes).

#### 0.2:
Installation fixes for Linux MySQL, widget order fix, added automatic-property detection, updated image urls ... Check it out!

#### 0.1:
Initial release



Resources
---------

### Developer
 *  [Yii Extension Page](http://www.yiiframework.com/extension/phundament/)
 *  [Fork us on github](https://github.com/phundament/app)
 *  [Report a bug](https://github.com/phundament/app/issues)
 *  [FAQ / Troubleshooting](https://github.com/schmunk42/phundament/wiki/FAQ)


### Help needed?
 *  [Yii Forum](http://www.yiiframework.com/forum/index.php?/topic/24696-extension-phundament/)
 *  [Google Group phundament-dev](http://groups.google.com/group/phundament-dev/)


### Additional Ressources
 *  [Quick Start Guide](https://github.com/schmunk42/phundament/wiki/Quick-Start)
 *  [Downloads](https://github.com/phundament/app/tags)
 *  [Wiki](https://github.com/schmunk42/phundament/wiki/)
 *  [Development Discussion](http://www.yiiframework.com/forum/index.php?/topic/17591-planning-yii-cms-a-different-approach/)
 *  [Demo Website](http://demo.phundament.com/3.0-dev/)
 *  [Phundament Website](http://phundament.com)
 *  [Company Website](http://herzogkommunikation.de)

### Extensions
 *  tbd

### Contact
 *  phundament@usrbin.de
 *  [Twitter](http://twitter.com/#!/phundament)
 *  [Facebook](http://www.facebook.com/phundament)
 *  [Google+](https://plus.google.com/114873431066202526630)
