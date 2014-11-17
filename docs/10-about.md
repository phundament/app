About
=====

Phundament is a PHP Application Foundation built upon Yii Framework 2.0 best for rapidly developing web
applications. It follows the 12factor specifications on a slim codebase.

Features
--------

### Code

- *advanced-app* directory structure
- minimalistic environment variables based configuration
- Docker, fig, vagrant and puPHPet support

### Console

- CLI command for application setup, updates and testing
- extended database migration support
- fully non-interactive deployment to work on PaaS

### Backend

- application backend dashboard ([screenshots](https://plus.google.com/+Phundament/posts/7y1TkmmsrcN?pid=6070967303804764434&oid=114873431066202526630))
- user management
- package browser
- extended model & crud code generators

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
common/
    config/             configurations used in all applications
    mail/               view files for e-mails
    models/             model classes used in all applications
    tests/              various tests for objects that are common among applications
frontend/, backend/
    assets/             application assets such as JavaScript and CSS
    config/             frontend configurations
    controllers/        Web controller classes
    models/             frontend-specific model classes
    runtime/            files generated during runtime
    tests/              various tests for the frontend application
    views/              view files for the Web application
    web/                the entry script and Web resources
console/
    config/             console configurations
    controllers/        console controllers (commands)
    migrations/         database migrations
    models/             console-specific model classes
    runtime/            files generated during runtime
    tests/              various tests for the console application
docs/                   developer documentation
tests/
    codeception         test suites
platforms/              environment configurations for Docker, vagrant, PaaS, ...
vendor/                 dependent 3rd-party packages
```

Branches
--------

The Phundament repository contains the following main branches:

- master (development, unstable)
- 4.0 (alpha, beta, RC, stable releases)
- 3.0 (alpha, beta, RC, stable releases)

Special thanks
--------------

... go out to the qiangxue, samdark, cebe, motin, mikehaertl, tonydspainyard, thyseus, quexer69, marc700 and disco-tex77 for their work, feedback and input.

Developed by
------------

[diemeisterei GmbH](http://diemeisterei.de)  
Immenhofer Straße 21  
D-70180 Stuttgart

Germany

- Core developer: Tobias Munk (schmunk42)
- [Contributors](https://github.com/phundament/app/graphs/contributors)
