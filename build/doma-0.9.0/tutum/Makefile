STACK_SUFFIX ?= -$(shell date "+%y%m%d-%H%M")
LOCAL_VOLUME ?= $(shell pwd)

tutum-stack-create: confirm		##@tutum Example: make staging-tutum stack-create REGISTRY_USER=<USER> REGISTRY_APIKEY=<KEY>
	docker run --rm -v $(LOCAL_VOLUME):/mnt -e TUTUM_USER=$(REGISTRY_USER) -e TUTUM_APIKEY=$(REGISTRY_APIKEY) \
		tutum/cli stack create -n $(COMPOSE_PROJECT_NAME)$(STACK_SUFFIX) -f /mnt/$(COMPOSE_FILE)

tutum-stack-stop: confirm
	docker run --rm -e TUTUM_USER=$(REGISTRY_USER) -e TUTUM_APIKEY=$(REGISTRY_APIKEY) \
		tutum/cli stack stop $(COMPOSE_PROJECT_NAME)$(STACK_SUFFIX)

tutum-stack-start: confirm
	docker run --rm -e TUTUM_USER=$(REGISTRY_USER) -e TUTUM_APIKEY=$(REGISTRY_APIKEY) \
		tutum/cli stack start $(COMPOSE_PROJECT_NAME)$(STACK_SUFFIX)

tutum-stack-status:
	docker run --rm -e TUTUM_USER=$(REGISTRY_USER) -e TUTUM_APIKEY=$(REGISTRY_APIKEY) \
		tutum/cli stack list | grep $(COMPOSE_PROJECT_NAME)$(STACK_SUFFIX)