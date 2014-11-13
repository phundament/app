Local VM with vagrant
---------------------

> NOTE! This section is under development

### Requirements

- [Vagrant](https://www.vagrantup.com)
- [VirtualBox](https://www.virtualbox.org)

### Get started! 

[Download](https://github.com/phundament/app/tags) or clone:

    git clone https://github.com/phundament/app.git
    cd app

#### Initialize

Upload the default configuration from `environments/puphpet/config-dist.yaml` via drag&drop to [PuPHPet](https://puphpet.com/)

> Adjust VM values if needed, eg. make sure to install `curl` and `gd`.

Click **Create** and download VM configuration package and extract its contents (`Vagrantfile`,`puphpet/`) to the project root folder.

Initialize application for puPHPet:

    cp ./environments/_puphpet/puphpet/files/exec-once/init.sh \
       ./puphpet/files/exec-once/init.sh

To access the virtual host in the VM later, update your `/etc/hosts` file:

    192.168.42.42    phundament.vagrant admin.phundament.vagrant

#### Run

    vagrant up

Open [phundament.vagrant](http://phundament.vagrant) or [admin.phundament.vagrant](http://admin.phundament.vagrant) in your browser.


### Accessing application in virtual machine

To open a shell in the VM run:

```
vagrant ssh
```

You can run commands directly in the virtual machine, eg.:

```
vagrant ssh --command "/var/www/yii"
```


Docker container with vagrant
-----------------------------

> Depending on your operating system, vagrant takes care about the required Docker setup.

#### Initialize

First time setup:

    cp ./environments/_docker-vagrant/dockerhost-vm/Vagrantfile \
       ~/dockerhost-vm/Vagrantfile

And set environment variable `DOCKER_HOST_VAGRANTFILE`.

Setup the app:

    cp ./environments/_docker/Dockerfile .
    cp ./environments/_docker-vagrant/Vagrantfile .

#### Run

    vagrant up
