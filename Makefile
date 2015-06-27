# Basic build-settings
# --------------------

COMPOSE_PROJECT_NAME ?= project
COMPOSE_FILE ?= docker-compose.yml

REGISTRY_HOST	 ?= example.com
REGISTRY_USER	 ?= username
PROJECT_REGISTRY ?= example.com/project

APP_NAMES   ?= app
APP_FOLDERS ?= .

TEST_OUTPUT_PATH	?= /app/tests/codeception/_output/latest
TEST_VERBOSITY		?= -v

# TODO: add vendor/schmunk42
DOCS_API_PATHS 		?= src,vendor/schmunk42,vendor/dmstr,vendor/codemix

default: help


# Templates
# ---------
DOMA_DIR = build/doma-0.9.0
include $(DOMA_DIR)/phundament/4.0/Makefile


# Local development config targets
# --------------------------------
.PHONY: TEST CI STAGING

TEST:		##@config configure application for local testing
	$(eval COMPOSE_FILE := build/stacks-gen/test.yml)

CI:		##@config configure application for continuous integration server
	$(eval BUILDER_SERVICE_SUFFIX := builder)
	$(eval COMPOSE_FILE := build/stacks-gen/test-ci.yml)

STAGING:    ##@config configure application for local staging
	$(eval COMPOSE_FILE := build/stacks-gen/staging.yml)


# Local development
# -----------------
.PHONY: dev migrate crud

migrate: 	##@Project app/migrate (database migrations with test data)
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii migrate --migrationLookup=@app/migrations/data

user: 		##@Project app/setup-admin-user (dektrium/user)
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii app/setup-admin-user

giiant: 	##@app build/crud.sh
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) build/app/crud.sh

giiant-module:
	docker-compose run app$(BUILDER_SERVICE_SUFFIX) ./yii gii/module --moduleID=$(MODULE_ID) --moduleClass=giiant\\$(MODULE_ID)\\Module


build-files: app-build-stacks app-update-version ##@dev dev shorthands

dev: app-setup app-up app-open

reset: docker-kill docker-rm