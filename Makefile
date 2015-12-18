# Phundament Makefile
# -------------------

SHELL           ?= /bin/bash

DOCKER_HOST_IP  ?= $(shell echo $(DOCKER_HOST) | sed 's/tcp:\/\///' | sed 's/:[0-9.]*//')
DOCKER_COMPOSE  ?= docker-compose

PHP_SERVICE		?= php
WEB_SERVICE		?= nginx

export HOST_APP_VOLUME  ?= .

UNAME_S := $(shell uname -s)
ifeq ($(UNAME_S), Darwin)
	OPEN_CMD = open
else
	OPEN_CMD = xdg-open
endif

.PHONY: help default all open bash build setup clean update run-tests TEST STAGE

default: help

all: diagnose init build setup up open    ##@docker build, setup, start & open application

diagnose: ##@system check requirements
	bash build/scripts/requirements.sh

up:      ##@docker start application
	$(DOCKER_COMPOSE) up -d
	$(DOCKER_COMPOSE) ps

open:	 ##@docker open application web service in browser
	$(OPEN_CMD) http://$(DOCKER_HOST_IP):`$(DOCKER_COMPOSE) port $(WEB_SERVICE) 80 | sed 's/[0-9.]*://'`

bash:	##@docker open application shell in container
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) bash

build:	##@docker build application images
	$(curl_check)
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) composer install
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) yii app/version
	$(DOCKER_COMPOSE) build --pull

init:
	cp -n .env-dist .env &2>/dev/null

setup:	##@docker setup application packages and database
	echo $(COMPOSE_FILE)
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) yii app/create-mysql-db
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) yii migrate --interactive=0
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) yii app/setup-admin-user --interactive=0

clean:  ##@docker remove application containers
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) rm -fv

run-tests:
	$(DOCKER_COMPOSE) up -d
	$(DOCKER_COMPOSE) run $(PHP_SERVICE) sh -c 'codecept clean && codecept run $(codecept_opts)'
	@echo "\nSee tests/codeception/_output for report files"


TEST:	##@config configure application for local testing
	$(eval PHP_SERVICE := tester)
	$(eval DOCKER_COMPOSE := docker-compose -f docker-compose.yml -f build/compose/test.override.yml)

STAGE:	##@config configure application for local staging
	$(eval DOCKER_COMPOSE := docker-compose -f docker-compose.yml -f build/compose/stage.override.yml)


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
