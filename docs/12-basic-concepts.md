Basic concepts
==============

Layers
------

### PHP Application source-code

The topmost layer of the stack is the application source-code in `/src`. The PHP application is build with
Yii 2.0 Framework.

- [View application source](https://github.com/phundament/app/tree/master/src)
- [View application tests](https://github.com/phundament/app/tree/master/tests)

### Containers

The application along with other services are run in containers, usually you have one container per service, but
you can also scale PHP-FPM with a haproxy or run multiple workers off a CLI container.

- [View application Dockerfile](https://github.com/phundament/app/blob/master/Dockerfile)
- [View Phundament Docker images](https://registry.hub.docker.com/repos/phundament/)

### Services

Services are defined in `docker-compose.yml` they describe the stack components, such as the PHP application, databases,
caches or testing containers.

- [View application service definition](https://github.com/phundament/app/blob/master/docker-compose.yml)

### Sub-Stacks

> **Heads up!** This feature is experimental.

Pundament applications can be grouped into sub-stacks by a prefix. These groups can be controller with `doma` Makefile-templates.
An example use-case for this would be two application tiers like an API and web-frontend.

### Stacks

Stacks and their service definitions can have different flavours. You may need slightly different setups in testing, staging
and production environment. Phundament features as `yaml-converter-command`, which can create stack files from templates.
  
- [View project stacks](https://github.com/phundament/app/tree/master/build/stacks-gen)
- [View Phundament stacks](https://github.com/neam/docker-stack/tree/develop/stacks/phundament)  

### Docker

Docker is the container-engine in which all services and tools are run, this ensures a maximum of portability across
 platforms and environments.

- [View build tools](https://github.com/phundament/app/tree/master/build)

Directory Structure
-------------------

```
Makefile            build and Docker stack control-targets
docker-compose.yml  docker container setup
Dockerfile          docker image build information
composer.json       application packages
codeception.yml     test-suite configuration

build/              files for Docker build tasks
docs/               application documentation (markdown)
runtime/            files generated during runtime
src/                application source-code
tests/              various tests for objects that are common among applications
vendor/             dependent 3rd-party packages
```

### src/

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
```
