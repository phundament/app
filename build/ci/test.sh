#!/bin/bash

# Script settings & info
set -e
pwd

# ENV settings
export DOCKER_CLIENT_TIMEOUT=120
export BUILDER_SERVICE_SUFFIX=builder
export APP_MIGRATION_LOOKUP=@app/migrations
export DOCS_OUTPUT_PATH=/app/tests/_output/docs

# Get commit info
APP_VERSION=$(cat version)
COMMIT_MESSAGE=$(git log -1 --pretty=%B)
echo "Application Version ${APP_VERSION}"
echo "${COMMIT_MESSAGE}"

# Persist vendor
# Note: This does not work with `git clone` as default checkout in CI
mkdir -p vendor && touch vendor/.gitkeep
if [ -d vendor/.git ] ; then echo "Directory 'vendor' is already a git repository."; else git -C vendor init; git -C vendor add .gitkeep; git -C vendor commit -m 'persist'; fi ;

# Cleanup, install, setup, build, test, tag
cp .env-dist .env
make CI docker-kill
make CI docker-rm

## Pull source images and build project image
make CI docker-pull

make CI OPTS='--prefer-dist' app-install
make CI app-build-assets docker-build

## Start and prepare application
make CI docker-up
# TODO: CI needs additional from run.sh and can not run: make CI app-setup
make CI app-run CMD='sh src/init.sh'
make CI app-clean-tests

make CI OPTS='-v acceptance prod' app-run-tests
make CI app-build-docs

## Tag source container
export BUILDER_SERVICE_SUFFIX=src
make docker-tag
make docker-push

# Create tagged image from git tag
## Get commit message
export LATEST_TAG=`git describe --abbrev=0`
export CURRENT_VERSION=`git describe`
export STACK_VERSION=`echo $CURRENT_VERSION | sed 's/\./-/g'`
## Create tagged image
if [ "$LATEST_TAG" = "$CURRENT_VERSION" ]; then
    echo "Stable tag $CURRENT_VERSION detected, tagging image..."
    make docker-tag version=$CURRENT_VERSION
    make docker-push version=$CURRENT_VERSION
    echo "Image pushed to registry."
else
    echo "No stable tag found."
fi;

# Final cleanup
make CI docker-kill docker-rm

exit 0
