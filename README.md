Phundament 3 App
================

Get Phundament 3 - the Yii Application Foundation with CMS features via composer.
For more details visit http://phundament.com.


Installation
------------

Download and extract the installer as ZIP or TAR.GZ file from a working tagged version here

https://github.com/phundament/app/tags

Enter the app root folder
```
cd phundament-app-SHA1
```

Get the packages with composer

```
php composer.phar install
```

All setup, database, file permissions and config setting should be done automatically.
 
 
Troubleshooting
---------------
 
 * Make sure you have git (http://git-scm.com/) and hg (http://mercurial.selenic.com/) installed
 * zlib extension or unzip available on your PATH
 * OpenSSL Support enabled in PHP or try ```--prefer-source```
 * ```php -d allow_url_fopen=1 -d memory_limit=64M composer.phar -v update```
 * Tested on Windows with WAMPSERVER 2.2 (PHP 5.3.10)
 * If you want to the very lastest version
   ```
   curl -L https://github.com/phundament/app/tarball/master | tar zx
   ```


Other Sources
-------------
If you're looking for a archive download of Phundament, visit: https://github.com/schmunk42/phundament/downloads

A git clone can be obtained with:
```
git clone --recursive https://github.com/schmunk42/phundament.git
```