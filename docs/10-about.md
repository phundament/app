About
=====

Phundament is a PHP Application Foundation built upon Yii Framework 2.0 best for rapidly developing web
applications.

Features
--------

- *advanced-app* directory structure
- guided CLI setup process
- environment variables based configuration
- puPHPet and vagrant support
- fully non-interactive deployment to work on PaaS
- CLI task runner for application updates and testing
- application backend dashboard [[screenshots](https://plus.google.com/+Phundament/posts/7y1TkmmsrcN?pid=6070967303804764434&oid=114873431066202526630)]
- user management module
- extension packages browser module
- extended database migration support
- extended model & crud code generators

Based upon Yii2 Advanced Application Template
---------------------------------------------

Yii 2 Advanced Application Template is a skeleton Yii 2 application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: frontend, backend, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.


Requirements
------------

- [Composer](http://getcomposer.org/doc/00-intro.md#installation-nix) installation
- PHP 5.4

### Recommendations

- git
- hg

Directory Structure
-------------------

```
docs/                   developer documentation
environments/           environment-based config templates (default overrides)
common/
    config/             configurations used in all applications
    mail/               view files for e-mails
    models/             model classes used in all applications
    tests/              various tests for objects that are common among applications
frontend/
    assets/             application assets such as JavaScript and CSS
    config/             frontend configurations
    controllers/        Web controller classes
    models/             frontend-specific model classes
    runtime/            files generated during runtime
    tests/              various tests for the frontend application
    views/              view files for the Web application
    web/                the entry script and Web resources
backend/
    assets/             application assets such as JavaScript and CSS
    config/             backend configurations
    controllers/        Web controller classes
    models/             backend-specific model classes
    runtime/            files generated during runtime
    tests/              various tests for the backend application
    views/              view files for the Web application
    web/                the entry script and Web resources
console/
    config/             console configurations
    controllers/        console controllers (commands)
    migrations/         database migrations
    models/             console-specific model classes
    runtime/            files generated during runtime
    tests/              various tests for the console application
tests/
    codeception         test suites
vendor/                 dependent 3rd-party packages
```

