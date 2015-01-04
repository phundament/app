About
=====

Phundament is a PHP Application Foundation built upon Yii Framework 2.0 best for rapidly developing web
applications. It follows the 12factor specifications on a slim codebase.

Features
--------

### Code

- *basic-app* directory structure
- minimalistic, environment variables based configuration
- Docker, fig, Vagrant and puPHPet support

### Console

- extended database migration support
- fully non-interactive deployment to work on PaaS
- CLI command for application maintenance tasks

### Backend

- application backend dashboard ([screenshots](https://plus.google.com/+Phundament/posts/7y1TkmmsrcN?pid=6070967303804764434&oid=114873431066202526630))
- user management
- package browser
- extended model & crud code generators

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

or  
 
 - Docker
 - fig
  
or 
 
 - Vagrant

### Recommendations

- git
- hg

Directory Structure
-------------------

```
.env                    configuration file with environment variables
    assets/             application assets such as JavaScript and CSS
    config/             configurations used in all applications
    controllers/        Web controller classes
    commands/           console controllers (commands)
    docs/               developer documentation
    mail/               view files for e-mails
    models/             application model classes
    runtime/            files generated during runtime
    migrations/         database migrations
    tests/              various tests for objects that are common among applications
    views/              view files for the Web application
    web/
    vendor/             dependent 3rd-party packages
```

Branches
--------

The Phundament repository contains the following main branches:

- master (development, unstable)
- 4.0 (alpha, beta, RC, stable releases)
- 3.0 (alpha, beta, RC, stable releases)

Special thanks
--------------

... go out to the qiangxue, samdark, cebe, motin, mikehaertl, tonydspainyard, crisu83, thyseus, quexer69, marc700 and disco-tex77 for their work, feedback and input.

Developed by
------------

[diemeisterei GmbH](http://diemeisterei.de)  
Immenhofer Straße 21  
D-70180 Stuttgart

Germany

- Core developer: Tobias Munk (schmunk42)
- [Contributors](https://github.com/phundament/app/graphs/contributors)
