About
=====

Phundament is a PHP Application Foundation built upon Yii Framework 2.0 best for rapidly developing web
applications. It follows the 12factor specifications on a slim codebase.

Features
--------

- *advanced-app* directory structure
- minimalistic environment variables based configuration
- guided CLI setup process
- Docker, fig, vagrant and puPHPet support
- fully non-interactive deployment to work on PaaS
- CLI task runner for application updates and testing
- application backend dashboard ([screenshots](https://plus.google.com/+Phundament/posts/7y1TkmmsrcN?pid=6070967303804764434&oid=114873431066202526630))
- user management module
- extension packages browser module
- extended database migration support
- extended model & crud code generators

Requirements
------------

### PHP-based installations

- [Composer](http://getcomposer.org/doc/00-intro.md#installation-nix) installation
- PHP 5.4

or  
 
 - Docker
 - fig

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
