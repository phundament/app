Requirements
============

 - Docker (boot2docker)
 - docker-compose
 - make

> Note: You can run Phundament also by installing it with [composer](http://getcomposer.org/doc/00-intro.md#installation-nix) or within a Vagrant VM. But we recommend docker, since it provides a consistent environment

### Linux

Install make, Docker & Compose
 
    apt-get install make
 
    curl -sSL https://get.docker.com/ | sh
    curl -L https://github.com/docker/compose/releases/download/1.3.1/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
    chmod +x /usr/local/bin/docker-compose


### OS X

See [Docker Mac OS X](https://docs.docker.com/installation/mac/) documentation.

> Note: You need to install `make` via *MacPorts*, *brew* or *Xcode*.

### Windows

See [Docker Windows](https://docs.docker.com/installation/windows/) documentation.

> Note: You need to install make in your VM.
