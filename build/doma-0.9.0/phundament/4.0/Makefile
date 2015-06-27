# doma - Makefile template for Phundament 4
# =========================================
#
# see http://phundament.com
#

.PHONY: no_targets__

APP_NAME  	?= app
YII_ENV		?= dev

WORKER_SERVICE_SUFFIX 	?= cli
BUILDER_SERVICE_SUFFIX 	?= src
PHP_SERVICE_SUFFIX 		?= fpm
WEB_SERVICE_SUFFIX 		?= nginx
COMPOSE_FILE			?= docker-compose.yml

APP_SRC_PATH		 		?= ./src
APP_ASSETS_SRC_LESS 		?= $(APP_SRC_PATH)/assets/less/app.less
APP_ASSETS_DEST_CSS 		?= $(APP_SRC_PATH)/assets/web/css/app.css
APP_ASSETS_CONFIG_PROD 		?= $(APP_SRC_PATH)/config/assets-prod.php
APP_ASSETS_CONFIG_DEV 		?= $(APP_SRC_PATH)/config/assets-dev.php
APP_ASSETS_GENERATED_CONFIGS?= $(APP_SRC_PATH)/config/assets-gen
APP_MIGRATION_LOOKUP 		?= @app/migrations

TEST_OUTPUT_PATH			?= /app/_output/latest

DOCS_OUTPUT_PATH			?= runtime/docs
DOCS_API_PATHS 				?= src
DOCS_GUIDE_PATHS 			?= docs


# Add this Makefile's targets to help
# -----------------------------------

HELP_FUN = \
		%help; \
		while(<>) { push @{$$help{$$2 // 'options'}}, [$$1, $$3] if /^([\w-]+)\s*:.*\#\#(?:@([\w-]+))?\s(.*)$$/ }; \
		print "\nusage: make [config] [target]\n\n"; \
	for (keys %help) { \
		print "$$_:\n"; \
		for (@{$$help{$$_}}) { \
			$$sep = "." x (25 - length $$_->[0]); \
			print "  $$_->[0]$$sep$$_->[1]\n"; \
		} \
		print "\n"; }

.PHONY: help
help:
	@$(MAKE) -f $(DOMA_DIR)/docker/Makefile help
	#
	# App specific targets
	#
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)


# Convenience targets
# -------------------

# TODO: Clean these up: setup depends on build and up
# TODO: removed `asssets` since not every app has it (eg. API)
all: app-pull app-install app-setup app-build-tests app-build app-update-version app-up app-open
all-no-build: app-pull app-setup app-up app-open


# App installation targets
# ------------------------

.PHONY: app-build-stacks
app-build-stacks:	  				##@install create docker-compose.yml files from stack templates (define @root for changing output folders)
	docker-compose run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) \
		./yii yaml/convert-docker-compose \
			--dockerComposeFile=@root/docker-compose.yml \
			--templateDirectory=@root/build/stacks-tpl \
			--outputDirectory=@root/build/stacks-gen \
			--templateReplacementsFile=@root/build/stacks-tpl/env.yml \
			$(OPTS)

.PHONY: app-init
app-init: _init-env app-install  	##@install initializes environment and installs Phundament application

_init-env:
	cp -i .env-dist .env

.PHONY: app-pull
app-pull: docker-pull	##@install pull application images

.PHONY: app-install
# TODO: composer.lock vendor
app-install: _install-packages  	##@install installs Phundament application
	# Target 'install' - Done.

_install-packages:
	#
	# Installing Docker stack ($(COMPOSE_FILE))
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) composer install $(OPTS)

.PHONY: app-setup
app-setup:	##@install prepare application runtime 
	# --------------------------------------------
	#
	# Setting up database, schema and admin user ($(COMPOSE_FILE))
	#	
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) \
		run --rm -e YII_ENV=$(YII_ENV) $(APP_NAME)$(WORKER_SERVICE_SUFFIX) \
		sh -c '\
			/app/yii app/create-mysql-db && \
			sleep 1 && \
			/app/yii migrate --interactive=0 --migrationLookup=$(APP_MIGRATION_LOOKUP) && \
			/app/yii app/setup-admin-user --interactive=0 \
		'

.PHONY: app-upgrade
app-upgrade: _update-packages 	##@install update application packages

_update-packages:
	#
	# Updating application packages for application '$(APP_NAME)'
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) \
		run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) \
		composer update -v --optimize-autoloader

.PHONY: app-build
app-build: 						##@install Build application image
	# ------------------------------------------------------------
	#
	# Building services for app '$(APP_NAME)' in stack '$(COMPOSE_PROJECT_NAME)'
	# ($(COMPOSE_FILE))
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) build $(APP_NAME)$(BUILDER_SERVICE_SUFFIX)
	docker images $(COMPOSE_PROJECT_NAME)_*


.PHONY: app-build-assets
app-build-assets: app-assets	##@install bundle application assets
app-assets: _assets-pre
	#
	# Building application assets ($(COMPOSE_FILE))
	# $(CWD)
	#
	# TODO: create assets (dev/prod) with param
	@echo "Compressing assets for application '$(APP_NAME)'" $(APP_ASSETS_SRC_LESS) $(APP_ASSETS_DEST_CSS)
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) lessc $(APP_ASSETS_SRC_LESS) $(APP_ASSETS_DEST_CSS)
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) /app/yii asset $(APP_ASSETS_CONFIG_PROD) $(APP_ASSETS_GENERATED_CONFIGS)/prod.php
	du -h web/assets-prod/css/*
	du -h web/assets-prod/js/*
	du -hs web/assets-prod/

_assets-pre:
	# ---------------------------
	#
	# Preparing asset output folders
	# $(CWD)
	# TODO: this is just a workaround for asset issue
	mkdir -p $(APP_SRC_PATH)/config/assets-gen/
	touch $(APP_SRC_PATH)/config/assets-gen/dev.php ./$(APP_SRC_PATH)/config/assets-gen/prod.php

	rm -rf web/assets-prod
	rm -rf web/assets-dev
	mkdir -p web/assets-dev/js web/assets-dev/css
	mkdir -p web/assets-prod/js web/assets-prod/css

.PHONY: app-update-version
app-update-version:		##@install 
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) \
		./yii app/version /app/version

# App running targets
# -------------------

.PHONY: app-up
app-up:			##@app Bring app APP_NAME up
	#
	# Creating app '$(APP_NAME)' (detached mode)
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) up -d --no-recreate \
		$(APP_NAME)$(WEB_SERVICE_SUFFIX)

.PHONY: app-stop
app-stop: docker-stop		##@running stop application

.PHONY: app-open
app-open: docker-open		##@running open application web service

.PHONY: app-run
app-run: SERVICE=$(APP_NAME)$(WORKER_SERVICE_SUFFIX)
app-run: docker-run		##@running run an interactive shell in application container

.PHONY: app-bash
app-bash: docker-bash		##@running run an interactive shell in application container

# App testing targets
# -------------------

.PHONY: app-clean-tests
app-clean-tests:	##@testing clean up codeception test output
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm \
			-e YII_ENV=test $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) \
			sh -c 'codecept clean'

.PHONY: app-build-tests
app-build-tests:	##@testing build codeception tests
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm \
			-e YII_ENV=test $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) \
			sh -c 'codecept build'

.PHONY: app-run-tests
app-run-tests:		##@testing test application; OPTS='-v acceptance prod'
	# ---------------------------------------------
	#
	# Starting application tests ($(COMPOSE_FILE))
	#
	# TODO: remove this line, when linked containers start up reliably on docker-compose run
	#docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) up -d $(APP_NAME)$(WORKER_SERVICE_SUFFIX)

	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) \
		run --rm -e YII_ENV=test -e SCREENSHOT_SUFFIX=$(REPORT_SUFFIX) $(APP_NAME)$(WORKER_SERVICE_SUFFIX) \
		sh -c 'codecept run $(OPTS) --html=_report$(REPORT_SUFFIX).html'


# App specific status enquiry targets
# -----------------------------------

.PHONY: app-check
app-check:		##@status project integrity check
ifneq ($(shell basename $(PWD)), $(COMPOSE_PROJECT_NAME))
	@echo "---------------------------------"
	@echo "        /!\ WARNING /!\\ \n"
	@echo "   Project directory name and"
	@echo "   COMPOSE_PROJECT_NAME differ."
	@echo "---------------------------------"
endif

.PHONY: app-info
app-info: app-show-installed
app-info:			##@status project info
	# ---------------------------------
	# Project Namespace: $(PROJECT_REGISTRY)
	# Project Name	 : $(COMPOSE_PROJECT_NAME)
	# Stack File	   : $(COMPOSE_FILE)
	#
	# ___Apps & Folders___
	# $(APP_NAME)
	# ---------------------------------

.PHONY: app-show-installed
app-show-installed:		##@status installed packages
	#
	# Composer packages for '$(APP_NAME)'
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) composer show -i

.PHONY: app-status
app-status:
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) env
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm \
		$(APP_NAME)$(BUILDER_SERVICE_SUFFIX) cat /etc/hosts
	boot2docker ssh df -h | grep sda1

.PHONY: app-linkcheck
app-linkcheck:		##@status run a linkcheck for your app
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(WORKER_SERVICE_SUFFIX) sh -c 'mkdir -p $(TEST_OUTPUT_PATH) && touch $(TEST_OUTPUT_PATH)/linkcheck.html && chmod 777 -R $(TEST_OUTPUT_PATH)'
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(WORKER_SERVICE_SUFFIX) linkchecker -F html/utf8/$(TEST_OUTPUT_PATH)/linkcheck.html http://WEB/ ; \

.PHONY: app-vhost
app-vhost:		##@status show virtual host configuration variables
	#
	# VIRTUAL_HOST ENV variables
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(WEB_SERVICE_SUFFIX) env | grep VIRTUAL_HOST

.PHONY: app-less
app-less:		##@status start a LESS watcher
	#
	# Starting LESS `watch` for application '$(APP_NAME)'
	# Usage: make watch app=<APP_NAME>
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(BUILDER_SERVICE_SUFFIX) watch lessc $(APP_ASSETS_SRC_LESS) $(APP_ASSETS_DEST_CSS)

.PHONY: app-build-docs
app-build-docs:		##@developer generate application documentation
	#
	# Generating application documentation
	#
	### TODO: docker-compose run app$(BUILDER_SERVICE_SUFFIX) docco -o runtime/docco src/config/main.php src/config/env.php build/ci/test.sh web/index.php
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) vendor/bin/apidoc api $(DOCS_API_PATHS) $(DOCS_OUTPUT_PATH) --pageTitle="$(APP_NAME)" --interactive=0
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) vendor/bin/apidoc guide $(DOCS_GUIDE_PATHS) $(DOCS_OUTPUT_PATH) --pageTitle="$(APP_NAME)" --interactive=0


# App specific AWS targets
# ------------------------

# include AWS commands
include $(DOMA_DIR)/aws/Makefile

.PHONY: aws-create-project-bucket
aws-create-project-bucket:
	@$(AWS) s3 mb s3://hrzg.$(COMPOSE_PROJECT_NAME) && echo "."
	@rm -rf $(shell pwd)/.s3/ && echo "."
	@mkdir $(shell pwd)/.s3/ && echo "."
	@mkdir $(shell pwd)/.s3/$(APP_NAME) && echo "."
	@mkdir $(shell pwd)/.s3/$(APP_NAME)/dev && touch $(shell pwd)/.s3/$(APP_NAME)/dev/.empty && echo "."
	@mkdir $(shell pwd)/.s3/$(APP_NAME)/test && touch $(shell pwd)/.s3/$(APP_NAME)/test/.empty && echo "."
	@mkdir $(shell pwd)/.s3/$(APP_NAME)/prod && touch $(shell pwd)/.s3/$(APP_NAME)/prod/.empty && echo "."
	@$(AWS) s3 sync $(shell pwd)/.s3/$(APP_NAME) s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME) --recursive --acl public-read && echo "."
	@rm -rf $(shell pwd)/.s3 && echo "."
	@echo "Done!"

.PHONY: aws-create-project-bucket
aws-delete-project-bucket:
	@$(AWS) s3 rb s3://hrzg.$(COMPOSE_PROJECT_NAME) --force
	@echo "Done!"

.PHONY: aws-sync-prod-to-dev
aws-sync-prod-to-dev:
	@$(AWS) s3 sync s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME)/prod s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME)/dev --recursive --acl public-read --delete
	@echo "Done!"

.PHONY: aws-sync-prod-to-test
aws-sync-prod-to-test:
	@$(AWS) s3 sync s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME)/prod s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME)/test --recursive --acl public-read --delete
	@echo "Done!"

.PHONY: aws-sync-test-to-dev
aws-sync-test-to-dev:
	@$(AWS) s3 sync s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME)/test s3://hrzg.$(COMPOSE_PROJECT_NAME)/$(APP_NAME)/dev --recursive --acl public-read --delete
	@echo "Done!"


# Catch and propagate inherited targets
# -------------------------------------

.EXPORT_ALL_VARIABLES:

.DEFAULT:
	@$(MAKE) -f $(DOMA_DIR)/docker/Makefile $@
