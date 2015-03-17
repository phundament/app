.PHONY: all build default

default: build

all: build

build: build-docker
	docker images myapp

build-docker:
	docker build -t myapp:latest .

update:
	docker-compose pull

release: build
	docker tag myapp:latest myapp:cli

stack:
	docker-compose up -d web fpm
	docker-compose logs