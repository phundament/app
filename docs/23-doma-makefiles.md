Make Phundament
===============


To control the build, testing and deployment process, Phundament takes leverage of `Makefile` templates from [doma](https://github.com/schmunk42/doma).
 
These templates basically wrap `docker` and `docker-compose` commands into easy to remember tasks or targets.

The key concept is to run all required tools inside the container, without having to type the whole exact command, along 
 with its parameters and options.

To see which commands are available run

    make

### Available tasks/targets

Here's a full list of `doma-0.8.1` commands:

```
$ make

#
# General targets
#

usage: make [target]

base:
  help.....................Show this help

doma:
  doma-version.............Show doma version
  doma-selfupdate..........Update doma (only works with git repo)

config:
  NON-INTERACTIVE..........Do not ask for confirmation

#
# Docker specific targets
#

usage: make [config] [target]

docker:
  docker-open..............open application web service
  docker-bash..............app=<prefix> Run a bash in builder container of
  docker-build.............Build images for all services
  docker-images............Show images with project and registry name prefix
  docker-kill..............Kill all project services
  docker-push..............Push project images to registry
  docker-run.............../!\ EXPERIMENTAL /!\ Usage: make docker-run service=<service> cmd=<command> run a command off a project service
  docker-start.............Start project stack and show processes
  docker-stop..............Stop project stack
  docker-tag...............Tag images for registry, if build and tests have been passed
  docker-up................Bring up all containers in stack

#
# App specific targets
#

usage: make [config] [target]

testing:
  app-clean-tests..........clean up codeception test output
  app-build-tests..........build codeception tests
  app-run-tests............test application; OPTS='-v acceptance prod'

app:
  crud.....................build/crud.sh
  app-up...................Bring app APP_NAME up

dev:
  build-files..............dev shorthands

status:
  app-check................project integrity check
  app-info.................project info
  app-show-installed.......installed packages
  app-linkcheck............run a linkcheck for your app
  app-vhost................show virtual host configuration variables
  app-less.................start a LESS watcher

install:
  app-build-stacks.........create docker-compose.yml files from stack templates (define @root for changing output folders)
  app-init.................initializes environment and installs Phundament application
  app-pull.................pull application images
  app-install..............installs Phundament application
  app-setup................prepare application runtime 
  app-upgrade..............update application packages
  app-build................Build application image
  app-build-assets.........bundle application assets
  app-update-version.......

running:
  app-stop.................stop application
  app-open.................open application web service
  app-bash.................run an interactive shell in application container

developer:
  app-build-docs...........generate application documentation

config:
  TEST.....................configure application for local testing
  CI.......................configure application for local staging
  STAGING..................configure application for local staging

Project:
  migrate..................app/migrate (migrate)
  user.....................app/migrate (migrate)
```

