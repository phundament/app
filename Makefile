# Phundament Makefile
# -------------------

PHP				?= php
WEB				?= nginx

DOCKER_HOST_IP  ?= $(shell echo $(DOCKER_HOST) | sed 's/tcp:\/\///' | sed 's/:[0-9.]*//')
DOCKER_COMPOSE  ?= docker-compose

export HOST_APP_VOLUME ?= .

.PHONY: open bash build setup clean update TEST STAGE

default: help

all: build setup up open    ##@docker build, setup, start & open application

up:      ##@docker start application
	$(DOCKER_COMPOSE) up -d
	$(DOCKER_COMPOSE) ps

open:	 ##@docker open application web service in browser
	open http://$(DOCKER_HOST_IP):`$(DOCKER_COMPOSE) port $(WEB) 80 | sed 's/[0-9.]*://'`

bash:	##@docker open application shell in container
	$(DOCKER_COMPOSE) run $(PHP) bash

build:	##@docker build application images
	$(DOCKER_COMPOSE) run $(PHP) composer install
	$(DOCKER_COMPOSE) run $(PHP) yii app/version
	$(DOCKER_COMPOSE) build --pull

setup:	##@docker setup application packages and database
	echo $(COMPOSE_FILE)
	cp -n .env-dist .env &2>/dev/null
	$(DOCKER_COMPOSE) run $(PHP) yii app/create-mysql-db
	$(DOCKER_COMPOSE) run $(PHP) yii migrate --interactive=0
	$(DOCKER_COMPOSE) run $(PHP) yii app/setup-admin-user --interactive=0

clean:  ##@docker remove application containers
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) rm -fv

update: ##@docker update application packages
	git pull
	$(DOCKER_COMPOSE) run php composer install

run-tests:
	$(DOCKER_COMPOSE) $(COMPOSE_FILES_PARAM) up -d
	$(DOCKER_COMPOSE) $(COMPOSE_FILES_PARAM) run $(PHP) sh -c 'codecept clean && codecept run $(codecept_opts)'
	@echo "\nSee tests/codeception/_output for report files"


TEST:	##@config configure application for local testing
	$(eval PHP := tester)
	$(eval DOCKER_COMPOSE := docker-compose -p testapp -f docker-compose.yml -f build/compose/test.override.yml)

STAGE:	##@config configure application for local staging
	$(eval DOCKER_COMPOSE := docker-compose -p stageapp -f docker-compose.yml -f build/compose/stage.override.yml)


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

help:				##@base show this help
	#
	# General targets
	#
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)