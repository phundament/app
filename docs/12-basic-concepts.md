Basic concepts
==============

Layers
------

### PHP Application source-code

The topmost layer of the stack is the application source-code in `/src`. The PHP application is build with
Yii 2.0 Framework.

### Containers

The application along with other services are run in containers, usually you have one container per service, but
you can also scale PHP-FPM with a haproxy or run multiple workers off a CLI container.

### Services

Services are defined in `docker-compose.yml` they describe the stack components, such as the PHP application, databases,
caches or testing containers.

### Sub-Stacks

Pundament applications can be grouped into sub-stacks by a prefix. These groups can be controller with `doma` Makefile-templates.
An example use-case for this would be two application tiers like an API and web-frontend.

### Stacks

Stacks and their service definitions can have different flavours. You may need slightly different setups in testing, staging
and production environment. Phundament features as `yaml-converter-command`, which can create stack files from templates.  

### Docker

Docker is the container-engine in which all services and tools are run, this ensures a maximum of portability across
 platforms and environments.
