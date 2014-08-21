# Running Phundament in a Virtual Machine



Install via Vagrant on a virtual-, cloud- or remote-server
----------------------------------------------------------

Download and install [Vagrant](http://www.vagrantup.com/downloads.html) and [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Get the project without installing it, vagrant will do that later.

~~~
composer create-project --no-install phundament/app:4.0.x-dev app-v4
~~~



Use an exsting Phundament 4 project or create-project a new one.

Go to [PuPHPet](https://puphpet.com/)

- Adjust Apache Virtual Host

  ```
  api01.mcgx.de
  Alias: api01.mcgx.de.vagrant
  /var/www/api01.mcgx.de/frontend/web
  ```
- Click Install Xdebug
- Click Create
- Download VM Image Configuration
- Extract
- Copy files to Phundament project-root


Add `puphpet/files/exec-once`

    composer create-project

Update your `/etc/hosts`





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

```
http://192.168.77.102/frontend/web/
```