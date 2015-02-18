About
=====

Phundament is a Web Application Foundation built upon PHP and Yii Framework 2.0, best for rapidly developing web
applications. It follows the [12factor specifications](http://12factor.net) on a very slim codebase.

The goal of Phundament is to provide a rock-solid base for integrating the best tools and plugins for web-application development, 
while not creating a new framework or [another competing standard](http://xkcd.com/927/). Instead, existing tools are pre-configured in a clean and
easy way.

Compared to the `yii2-app-advanced` and `yii2-app-basic` Phundament introduces a configuration based on environment variables,
which gives you a maximum of control over your application setup.


Features
--------

### Code

- *yii2-app-basic* directory structure
- minimalistic, environment variables based configuration
- Docker, fig, Vagrant and puPHPet support

### Frontend

- full responsive Bootstrap 3 theme

### Backend

- application backend dashboard ([screenshots](https://plus.google.com/+Phundament/posts/7y1TkmmsrcN?pid=6070967303804764434&oid=114873431066202526630))
- user management
- package browser
- extended model & crud code generators

### Console

- extended database migration support
- fully non-interactive deployment to work on PaaS
- CLI command for application maintenance tasks
- containerized Yii 2.0 Codeception test-suites 


Status
------

[![Total Downloads](https://poser.pugx.org/phundament/app/downloads.png)](https://packagist.org/packages/phundament/app)

[![Latest Stable Version](https://poser.pugx.org/phundament/app/v/stable.png)](https://packagist.org/packages/phundament/app)
[![Build Status](https://travis-ci.org/phundament/app.png?branch=4.0)](https://travis-ci.org/phundament/app)

[![Latest Unstable Version](https://poser.pugx.org/phundament/app/v/unstable.png)](https://packagist.org/packages/phundament/app)
[![Build Status](https://travis-ci.org/phundament/app.png?branch=master)](https://travis-ci.org/phundament/app)

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/phundament/app/badges/quality-score.png?s=4d1ce01151a4e82df75b563e7ccf0001cc227bd1)](https://scrutinizer-ci.com/g/phundament/app/)


Requirements
------------

- [Composer](http://getcomposer.org/doc/00-intro.md#installation-nix) installation
- PHP 5.4

or a virtualized setup with eg. VirtualBox
 
 - Docker
 - fig (docker-compose)
  
or 
 
 - Vagrant

### Recommendations

- git
- hg


Directory Structure
-------------------

```
yii                 application CLI
assets/             application assets such as JavaScript and CSS
.env, config/       application configuration
controllers/        web-controller classes
commands/           console controller classes
models/             application model classes
modules/            application modules (eg. admin)
migrations/         database migrations
views/              view files for the application
web/                document root with entry-script

composer.json       application packages
vendor/             dependent 3rd-party packages

codeception.yml     test-suite configuration
tests/              various tests for objects that are common among applications

data/               application storage
runtime/            files generated during runtime

Dockerfile          docker image build information
fig.yml             docker container setup

Vagrantfile         Vagrant (docker) container setup
Vagrantfile-dock..  Vagrant (docker) host VM
```

Branches
--------

The Phundament repository contains the following main branches:

- master (development, unstable)
- 4.0 (alpha, beta, RC, stable releases)
- 3.0 (alpha, beta, RC, stable releases)


Special thanks
--------------

...go out to qiangxue, samdark, cebe, the yii core-devs, motin, mikehaertl, tonydspainyard, crisu83, thyseus, quexer69, marc7000 and disco-tex77 for their work, feedback and input.


Developed by
------------

[diemeisterei GmbH](http://diemeisterei.de)  
Immenhofer Straße 21  
D-70180 Stuttgart

Germany

- Core developer: Tobias Munk (schmunk42)
- [Contributors](https://github.com/phundament/app/graphs/contributors)

---

*Continue to [Installation](20-installation.md)*