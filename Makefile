# Basic build-settings
# --------------------

COMPOSE_PROJECT_NAME ?= project
COMPOSE_FILE ?= docker-compose.yml

REGISTRY_HOST	 ?= example.com
REGISTRY_USER	 ?= username
PROJECT_REGISTRY ?= example.com/project

APP_NAMES   ?= app
APP_FOLDERS ?= .

TEST_VERBOSITY			?=-v

default: help


# Templates
# ---------

include $(DOMA_DIR)/phundament/4.0/Makefile


# Local development config targets
# --------------------------------
.PHONY: TEST CI STAGING

TEST:		##@config configure application for local testing
	$(eval COMPOSE_FILE := build/stacks-gen/test.yml)

CI:		##@config configure application for local staging
	$(eval BUILDER_SERVICE_SUFFIX := builder)
	$(eval COMPOSE_FILE := build/stacks-gen/test-ci.yml)
	$(eval COMPOSE_PROJECT_NAME := adam)

STAGING:    ##@config configure application for local staging
	$(eval COMPOSE_FILE := build/stacks-gen/staging.yml)


# Local development
# -----------------

migrate: 	##@Project app/migrate (migrate)
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii migrate --migrationLookup=@app/migrations/data

user: 		##@Project app/migrate (migrate)
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii app/setup-admin-user

crud: 		##@app build/crud.sh
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) build/app/crud.sh

build-files: app-build-stacks app-update-version ##@dev dev shorthands

dev: app-up app-open

reset: docker-kill docker-rm