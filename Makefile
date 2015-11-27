# Phundament Makefile
# -------------------

PHP				?= php
WEB				?= nginx

DOCKER_HOST_IP  ?= $(shell echo $(DOCKER_HOST) | sed 's/tcp:\/\///' | sed 's/:[0-9.]*//')

.PHONY: open bash build setup clean update

default: help

all: build setup up open

up:      ##@docker start application
	docker-compose up -d
	docker-compose ps

open:	 ##@docker open application web service in browser
	open http://$(DOCKER_HOST_IP):`docker-compose port $(WEB) 80 | sed 's/[0-9.]*://'`

bash:	##@docker open application shell in container
	docker-compose run $(PHP) bash

build:	##@docker build application images
	docker-compose build --pull

setup:	##@docker setup application packages and database
	echo $(COMPOSE_FILE)
	cp -n .env-dist .env &2>/dev/null
	docker-compose run $(PHP) composer install
	docker-compose run $(PHP) yii app/version
	docker-compose run $(PHP) yii app/create-mysql-db
	docker-compose run $(PHP) yii migrate --interactive=0
	docker-compose run $(PHP) yii app/setup-admin-user --interactive=0


clean:  ##@docker remove application containers
	docker-compose kill
	docker-compose rm -fv

update: ##@docker update application packages
	git pull
	docker-compose run php composer install


TEST:	##@config configure application for local testing
	$(eval COMPOSE_PROJECT_NAME := test${COMPOSE_PROJECT_NAME})
    $(eval COMPOSE_FILES_PARAM := -f docker-compose.yml -f build/compose/testing.yml)

run-tests:
	docker-compose $(COMPOSE_FILES_PARAM) up -d
	docker-compose $(COMPOSE_FILES_PARAM) run tester sh -c 'YII_ENV=test codecept run'

# Help based on https://gist.github.com/prwhite/8168133 thanks to @nowox and @prwhite
# And add help text after each target name starting with '\#\#'
# A category can be added with @category

HELP_FUN = \
		%help; \
		while(<>) { push @{$$help{$$2 // 'options'}}, [$$1, $$3] if /^([\w-]+)\s*:.*\#\#(?:@([\w-]+))?\s(.*)$$/ }; \
		print "\nusage: make [target]\n\n"; \
	for (keys %help) { \
		print "$$_:\n"; \
		for (@{$$help{$$_}}) { \
			$$sep = "." x (25 - length $$_->[0]); \
			print "  $$_->[0]$$sep$$_->[1]\n"; \
		} \
		print "\n"; }

help:				##@base Show this help
	#
	# General targets
	#
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)