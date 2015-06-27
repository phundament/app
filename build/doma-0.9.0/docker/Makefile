# doma - Makefile template for Docker CLI tools
# =============================================

REGISTRY_HOST	 ?= registry
REGISTRY_USER	 ?= username
REGISTRY_PASS	 ?= secret
PROJECT_REGISTRY ?= $(REGISTRY_HOST)/$(REGISTRY_USER)

APP_NAME  ?= app

BUILDER_SERVICE_SUFFIX 	?=
WORKER_SERVICE_SUFFIX 	?=
WEB_SERVICE_SUFFIX 		?=

IMAGE_NAME 		?= $(COMPOSE_PROJECT_NAME)-$(APP_NAME)$(BUILDER_SERVICE_SUFFIX)
IMAGE_VERSION 	?= latest

COMPOSE_FILE		?= docker-compose.yml
DOCKER_HOST_IP 		?= $(shell echo $(DOCKER_HOST) | sed 's/tcp:\/\///' | sed 's/:[0-9.]*//')
DOMA_ENVIRONMENT 	?= ""



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
	@$(MAKE) -f $(DOMA_DIR)/base/Makefile help
	#
	# Docker specific targets
	#
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)




# Actions targets
# ---------------

.PHONY: docker-open
docker-open:	##@docker open application web service
	#
	# Detecting web service port of '$(APP_NAME)'
	#
	docker-compose  -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) port $(APP_NAME)$(WEB_SERVICE_SUFFIX) 80 | sed 's/[0-9.]*://'
	open http://$(DOCKER_HOST_IP):`docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) port $(APP_NAME)$(WEB_SERVICE_SUFFIX) 80 | sed 's/[0-9.]*://'`

.PHONY: docker-bash
docker-bash:		##@docker app=<prefix> Run a bash in builder container of
	#
	# Running bash in $(app)src container
	#
	# Use `exit` to end the bash session
	# Heads up: Hit <enter> a few times if the bash is not coming up immediately.
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(APP_NAME)$(WORKER_SERVICE_SUFFIX) /bin/bash


.PHONY: docker-build
docker-build:		##@docker Build images for all services
	# ------------------------------------------------------------
	#
	# Building all services in stack '$(COMPOSE_PROJECT_NAME)'
	# ($(COMPOSE_FILE))
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) build
	docker images $(COMPOSE_PROJECT_NAME)_*


.PHONY: docker-destroy  ##@deprecated
docker-destroy: confirm docker-kill docker-rm

.PHONY: docker-image-list
docker-image-list: docker-images

.PHONY: docker-images
docker-images:		##@docker Show images with project and registry name prefix
	# ------------------------------------------------------------
	#
	# Stack images stack '$(COMPOSE_PROJECT_NAME)'
	#
	@pwd
	docker images *$(COMPOSE_PROJECT_NAME)_*
	docker images $(PROJECT_REGISTRY)/$(COMPOSE_PROJECT_NAME)-*

.PHONY: docker-kill
docker-kill:		##@docker Kill all project services
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) kill

.PHONY: docker-login
docker-login:
	#
	# Logging in to registry host
	#
	# docker-cli login
	# DISABLED: docker login --username=$(REGISTRY_USER) --password=$(REGISTRY_PASS) --email=noreply@example.com $(REGISTRY_HOST)
	#
	# docker-compose login
	docker login --username="$(REGISTRY_USER)" --password="$(REGISTRY_PASS)" --email="noreply@example.com" https://$(REGISTRY_HOST)/v1/

.PHONY: docker-logs
docker-logs:
	#
	# Attaching to container log output
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) logs $(SERVICE)

.PHONY: docker-ps
docker-ps:
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) ps

.PHONY: docker-pull
docker-pull:
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) pull

.PHONY: docker-push
docker-push: docker-login		##@docker Push project images to registry
	#
	# Pushing images to repository
	#
	docker push $(PROJECT_REGISTRY)/$(IMAGE_NAME):$(IMAGE_VERSION)

.PHONY: docker-rm
docker-rm:
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) rm --force $(SERVICE)

.PHONY: docker-run
docker-run:		##@docker /!\ EXPERIMENTAL /!\ Usage: make docker-run service=<service> cmd=<command> run a command off a project service
	#
	# Runs an service in the project (for debugging only)
	# Usage: make run service=<service> cmd=<command>
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) run --rm $(SERVICE) $(CMD)

.PHONY: docker-start _start
docker-start: _start docker-ps		##@docker Start project stack and show processes
_start:
	#
	# Starting app '$(APP_NAME)'
	# Run `make up` only after docker-compose.yml or Dockerfile changes
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) start $(APP_NAME)$(BUILDER_SERVICE_SUFFIX)

.PHONY: docker-stop
docker-stop:		##@docker Stop project stack
	#
	# Stopping stack
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) stop

.PHONY: docker-tag
docker-tag:    	##@docker Tag images for registry, if build and tests have been passed
#
	#
	# Tagging images for production
	#
	###version := $(shell cat VERSION)
	docker tag -f \
		$(COMPOSE_PROJECT_NAME)_$(APP_NAME)$(BUILDER_SERVICE_SUFFIX) \
		$(PROJECT_REGISTRY)/$(IMAGE_NAME):$(IMAGE_VERSION)
	docker images $(PROJECT_REGISTRY)/$(IMAGE_NAME)

.PHONY: docker-up
docker-up:			##@docker Bring up all containers in stack
	#
	# Creating stack (detached mode)
	#
	docker-compose -p $(COMPOSE_PROJECT_NAME) -f $(COMPOSE_FILE) up -d $(OPTS)


.PHONY: docker-check
docker-check:
	# docker-compose requirement >= 1.2.0
	docker-compose --version

# Catch and propagate inherited targets
# -------------------------------------

.EXPORT_ALL_VARIABLES:

.DEFAULT:
	@$(MAKE) -C $(DOMA_DIR)/base $@
