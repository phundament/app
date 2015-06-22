Develop & Deploy
================

> NOTE! This section is under development

Phundament supports various tools like [Docker](https://www.docker.com), [Vagrant](https://www.vagrantup.com), [VirtualBox](https://www.virtualbox.org) or [PuPHPet](https://puphpet.com) on different platforms.


### Local development

> **Heads up!** This section uses [doma](https://github.com/schmunk42/doma).

Build assets and images

    make app-build-assets app-build
    
    make STAGING app-up app-open


### Vagrant

 - [Vagrant and Docker containers](51-vagrant-docker.md)
 - [Vagrant and virtual machines](51-vagrant.md)


### Cloud deployment
 
 - [Vagrant on a cloud- or remote-server](51-vagrant-cloud.md)
 - [Platform as a Service](52-paas.md) (PaaS) providers

You can modify the above config examples easily for VMWare, Parallels, HyperV, RedHat, Amazon AWS, DigitalOcean, Rackspace and many more.

