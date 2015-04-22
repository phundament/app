# Settings for kohlhammer-feuerwehr.de
# ---------

COMPOSE_PROJECT_NAME ?= project
COMPOSE_FILE ?= docker-compose.yml

REGISTRY_HOST	 ?= example.com
REGISTRY_USER	 ?= username
PROJECT_REGISTRY ?= example.com/project

APP_NAMES   ?= app
APP_FOLDERS ?= .

BUILDER_SERVICE_SUFFIX 	?= cli
BUILDER_SERVICE_SUFFIX 	?= src
TEST_VERBOSITY			?=-v

default: help


# Templates
# ---------

include $(DOMA_DIR)/phundament/4.0/Makefile
include $(DOMA_DIR)/tutum/Makefile


# Local development config targets
# --------------------------------

stack-test-local:		##@config configure application for local testing
	$(eval BUILDER_SERVICE_SUFFIX := builder)
	$(eval COMPOSE_FILE := docker-compose-test-local.yml)

stack-staging-local:		##@config configure application for local staging
	$(eval BUILDER_SERVICE_SUFFIX := src)
	$(eval COMPOSE_FILE := docker-compose-staging-local.yml)

# Local development
# -----------------

migrate: ##@Project app/migrate (migrate)
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii migrate --migrationLookup=@app/migrations/data

user: ##@Project app/migrate (migrate)
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii app/setup-admin-user

crud: ##@app build/crud.sh
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) build/app/crud.sh

build-files: docker-compose-stacks update-version ##@dev dev shorthands