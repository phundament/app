Installation
============

> Note: You can run Phundament also by installing it with [composer](http://getcomposer.org/doc/00-intro.md#installation-nix) or within a Vagrant VM. But we recommend docker, since it provides a consistent environment

Clone the repository and go to the application directory

    git clone https://github.com/phundament/app

Create environment configuration file

    cd app
    cp .env-dist .env

For the first initial setup run

    make all

You can also chain single commands

    make app-up app-setup app-open
   
Or use configuration targets
   
    make TEST docker-up

    make STAGING docker-up



