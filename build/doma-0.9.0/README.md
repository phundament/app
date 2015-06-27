# дома

`doma` is a Makefile template collextion around your docker and application build process.


---

> **IMPORTANT NOTICE!** THIS PROJECT IS IN ALPHA STAGE.

---

Requirements
------------

- `make`
- `docker` >= 1.6.0

Features
--------

doma provides a base `Makefile` for the basic command around your Docker stack.
It can distinguish sub-stacks by prefixes and handles naming of images and containers through
environment variables to keep a clean Docker build environment and minimal overhead when building
and push images and running containers.

- stack templating
- stack environments
- stack build management
- stack deployment

Installation
------------

Get doma by cloning the repository into a location of your choice

    git clone git@git.hrzg.de:t.munk/doma.git

Link the script to a directory from `PATH` and set permissions    
    
    echo -e "export DOMA_DIR=`pwd`/doma" >> ~/.bash_profile

Basic usage
-----------

*Examples based on `phundament/4.0` template*

Show help

    make

usually you should be able to get started with
       
    make all

build your images

    make app-build
    
you can also chain commands    
    
    make docker-destroy docker-up app-setup app-open
    
or use a configuration target, written in uppercase by convention (`TEST`), to select another stack via ENV variables
    
    make TEST app-run-tests

you can run also combine these to compile assets and build images with their default names and then start the `STAGING` stack configuration with images from the first build process

    make app-build-assets app-build-all STAGING all


Customize
---------

Go to a project with a `docker-compose` file located in the root folder and create a `Makefile`.

### Basic example
    
    # Project Settings
    # ----------------
    
    COMPOSE_PROJECT_NAME    ?= elk
    
    # Templates
    # ---------
    
    include $(DOMA_DIR)/docker/Makefile


### Advanced example    
    
Adjust the `Makefile` file in your project with your basic project settings...

    # Settings
    # --------
    
    COMPOSE_PROJECT_NAME    ?= myapp
    COMPOSE_FILE            ?= docker-compose.yml

    REGISTRY_HOST	 ?= registry.hrzg.de
    REGISTRY_USER	 ?= registry
    PROJECT_REGISTRY ?= registry.hrzg.de/tci-partners
    
    APP_NAMES   ?= app
    APP_FOLDERS ?= .
    
    BUILDER_SERVICE_SUFFIX 	?= builder
    TEST_VERBOSITY			?=-v
    
    default: help

...and include the desired templates.    
    
    # Templates
    # ---------
    
    include $(DOMA_DIR)/phundament/4.0/Makefile

Finally add your configuration targets.    
    
    # Local development config targets
    # --------------------------------
    
    TEST:		##@app configure application for local testing
    	$(eval BUILDER_SERVICE_SUFFIX := builder)
    	$(eval COMPOSE_FILE := docker-compose-test-local.yml)
    	$(eval COMPOSE_PROJECT_NAME := testmyapp)

    STAGING:	##@app configure application for local staging
        $(eval BUILDER_SERVICE_SUFFIX := builder)
        $(eval COMPOSE_FILE := docker-compose-test-local.yml)
        $(eval COMPOSE_PROJECT_NAME := testmyapp)

    # Local development
    # -----------------
    
    crud: ##@app build/crud.sh
    	@sh build/crud.sh


### Naming

To ensure a consistent naming in the development and deployment process, set the following values

```
PROJECT_REGISTRY=registry/username
COMPOSE_PROJECT_NAME=yii2project
```

### Sub-applications

You can add multiple apps by using a prefix, make sure that both lists correspond exactly!

```
APP_NAMES   = app    api     
APP_FOLDERS = ./app  ./api
```

### File-structure

```
BUILDER_SERVICE_SUFFIX = src
WEB_SERVICE_SUFFIX = web
```

### Private registry

```
REGISTRY_HOST=tutum.co
REGISTRY_USER=username
REGISTRY_PASS=secret
```

Tips
----

One-liner to install doma e.g. on your CI system

    # instant-doma (Makefile templates)
    if [ -d doma ] ; then git -C doma pull ; else git clone git@git.hrzg.de:t.munk/doma.git doma ; fi ; export DOMA_DIR=`pwd`/doma

Contribute
----------

PRs are always highly welcome.

Author
------
    
- Tobias Munk (schmunk42)
- Tim Gleue
- [diemeisterei](http://diemeisterei.de)

Links
-----
    
- [GitHub](https://github.com/schmunk42/doma)
- [docker-stack](https://github.com/neam/docker-stack) - docker-compose stack templates 
- [Phundament](http://phundament.com)
