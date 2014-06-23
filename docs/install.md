Get started!
------------

> The minimum requirement by this application template that your Web server supports PHP 5.4.0.


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the Phundament application template using the following command:

~~~
composer.phar create-project phundament/app:4.0.x-dev app-v4
~~~

Now you should be able to access the application through the following URL, assuming `app-v4` is the directory
directly under the Web root.

~~~
http://localhost/app-v4/web/
~~~


After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Set document roots of your Web server:

- for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
- for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

To login into the application, you need to first sign up, with any of your email address, username and password.
Then, you can login into the application with same email address and password at any time.



Install via Vagrant on a virtual-, cloud- or remote-server
----------------------------------------------------------

Download and install [Vagrant](http://www.vagrantup.com/downloads.html) and [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Get the project without installing it, vagrant will do that later.

~~~
composer create-project --no-install phundament/app:4.0.x-dev app-v4
~~~

Bring up the virtual machine:

~~~
cd app
vagrant up
~~~

In the meantime, update your `/etc/hosts` file:

~~~
192.168.33.101    phundament.vagrant
~~~

Open [phundament.vagrant](http://192.168.33.101/phundament.vagrant) or [http://192.168.33.101](http://192.168.33.101) in your browser.

