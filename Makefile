# Phundament Makefile
# -------------------

SHELL           ?= /bin/bash

DOCKER_COMPOSE  ?= docker-compose

PHP_SERVICE		?= php
WEB_SERVICE		?= nginx

export BUILD_PREFIX ?= $(shell echo $(notdir $(PWD)) | tr -dc '[:alnum:]\n\r' | tr '[:upper:]' '[:lower:]')
export IMAGE_TAG    ?= :$(BUILD_PREFIX)

UNAME_S := $(shell uname -s)
ifeq ($(UNAME_S), Darwin)
	OPEN_CMD        ?= open
	DOCKER_HOST_IP  ?= $(shell echo $(DOCKER_HOST) | sed 's/tcp:\/\///' | sed 's/:[0-9.]*//')
else
	OPEN_CMD        ?= xdg-open
	DOCKER_HOST_IP  ?= 127.0.0.1
endif

.PHONY: help default all open bash build setup clean update tests clean-tests run-tests TEST STAGE

default: help

all: diagnose build init up setup open    ##@docker build, setup, start & open application

diagnose: ##@system check requirements
	bash build/scripts/requirements.sh

up:      ##@docker start application
	$(DOCKER_COMPOSE) up -d
	$(DOCKER_COMPOSE) ps

open:	 ##@docker open application web service in browser
	$(OPEN_CMD) http://$(DOCKER_HOST_IP):$(shell $(DOCKER_COMPOSE) port $(WEB_SERVICE) 80 | sed 's/[0-9.]*://')

bash:	##@docker open application shell in container
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) bash

build:	##@docker build application images
	$(shell echo $(shell git describe --long --tags --dirty --always) > src/version)
	@echo $(shell cat src/version)
	$(DOCKER_COMPOSE) build

init:   ##@docker setup config files and install composer vendor packages (host-volume required)
	cp -n .env-dist .env &2>/dev/null
	cp -n docker-compose.override-dist.yml docker-compose.override.yml &2>/dev/null
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) composer install

setup:	##@docker setup application packages and database
	echo $(COMPOSE_FILE)
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) setup.sh

clean:  ##@docker remove application containers
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) rm -fv
	-$(DOCKER_COMPOSE) down

tests:
	$(MAKE) build
	$(MAKE) TEST setup up clean-tests run-tests

clean-tests:
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) sh -c 'codecept clean'

run-tests:
	$(DOCKER_COMPOSE) up -d
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) sh -c 'codecept run $(codecept_opts)'
	@echo "\nSee tests/codeception/_output for report files"

TEST: export COMPOSE_PROJECT_NAME?=testapp
TEST:	##@config configure application for local testing
	$(eval PHP_SERVICE := tester)
	$(eval DOCKER_COMPOSE := docker-compose -p "$$(COMPOSE_PROJECT_NAME)" -f docker-compose.yml -f build/compose/test.override.yml)

STAGE: export COMPOSE_PROJECT_NAME?=stageapp
STAGE:	##@config configure application for local staging
	$(eval DOCKER_COMPOSE := docker-compose -p "$$(COMPOSE_PROJECT_NAME)" -f docker-compose.yml -f build/compose/stage.override.yml)


# Help based on https://gist.github.com/prwhite/8168133 thanks to @nowox and @prwhite
# And add help text after each target name starting with '\#\#'
# A category can be added with @category

HELP_FUN = \
		%help; \
		while(<>) { push @{$$help{$$2 // 'options'}}, [$$1, $$3] if /^([\w-]+)\s*:.*\#\#(?:@([\w-]+))?\s(.*)$$/ }; \
		print "\nusage: make [target ...]\n\n"; \
	for (keys %help) { \
		print "$$_:\n"; \
		for (@{$$help{$$_}}) { \
			$$sep = "." x (25 - length $$_->[0]); \
			print "  $$_->[0]$$sep$$_->[1]\n"; \
		} \
		print "\n"; }

help:				##@system show this help
	#
	# General targets
	#
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)
