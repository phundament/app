# doma for yiisoft/yii2-basic-app
# ===============================
#
# see https://github.com/neam/docker-stack/develop
#

PROJECT_REGISTRY ?= registry/username
COMPOSE_PROJECT_NAME ?= yii2project
APP_NAMES ?= yii2app
APP_FOLDERS ?= .

STACK_YML ?= docker-compose.yml
BUILDER_SERVICE_SUFFIX ?= src
WEB_SERVICE_SUFFIX ?= web

default: help

init:   ##@yii2 Initialize application from Docker image
	docker run --rm -v `pwd`:/init schmunk42/php:5.6-cli-yii-2.0.3-app-basic cp -r /app/. /init ; \
    curl -O https://raw.githubusercontent.com/neam/docker-stack/develop/stacks/yii2/docker-compose.yml ; \
    curl -O https://raw.githubusercontent.com/neam/docker-stack/develop/stacks/yii2/.dockerignore ; \
    curl -O https://raw.githubusercontent.com/neam/docker-stack/develop/stacks/yii2/Dockerfile; \
	echo "Yii 2.0 Basic App initalized."

