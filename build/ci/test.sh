#!/bin/bash

set -e
pwd

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

# cleanup, install, setup, build, test, tag
cp .env-dist .env
make CI docker-kill docker-rm
make CI docker-pull
make CI OPTS='--prefer-dist' app-install
make CI app-build-assets docker-build
make CI docker-up
make CI app-setup
make CI app-clean-tests
make CI OPTS='-v acceptance prod' app-run-tests
make CI app-build-docs
export BUILDER_SERVICE_SUFFIX=src
make docker-tag
make docker-push

# Get commit message
export LATEST_TAG=`git describe --abbrev=0`
export CURRENT_VERSION=`git describe`
export STACK_VERSION=`echo $CURRENT_VERSION | sed 's/\./-/g'`

# Create tagged image
if [ "$LATEST_TAG" = "$CURRENT_VERSION" ]; then
    echo "Stable tag $CURRENT_VERSION detected, tagging image..."
    make docker-tag version=$CURRENT_VERSION
    make docker-push version=$CURRENT_VERSION
    echo "Image pushed to registry."
else
    echo "No stable tag found."
fi;

make CI docker-kill docker-rm

exit 0
