Installation
============

Requirements
------------

The minimum requirement by this application template that your Web server supports
PHP 5.4.0.

Install via composer bare-metal on your local machine
-----------------------------------------------------

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following command:

~~~
composer.phar create-project phundament/app:4.0.x-dev app-v4
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


Install via Vagrant on a virtual-, cloud- or remote-server
----------------------------------------------------------

Download and install [Vagrant](http://www.vagrantup.com/downloads.html) and [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Get the project without installing it, vagrant will do that later.

~~~
composer.phar create-project --no-install phundament/app:4.0.x-dev app-v4
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

