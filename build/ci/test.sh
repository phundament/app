#!/bin/bash

set -e
pwd

export BUILDER_SERVICE_SUFFIX=builder
export APP_MIGRATION_LOOKUP=@app/migrations

# get commit info
APP_VERSION=$(cat version)
COMMIT_MESSAGE=$(git log -1 --pretty=%B)
echo "Application Version ${APP_VERSION}"
echo "${COMMIT_MESSAGE}"

# instant-doma (Makefile templates)
export GIT_SSL_NO_VERIFY=1; if [ -d doma ] ; then git -C doma pull ; else git clone https://github.com/schmunk42/doma.git doma ; fi ; export DOMA_DIR=`pwd`/doma

# persist vendor
mkdir -p vendor && touch vendor/.gitkeep
if [ -d vendor/.git ] ; then echo "Directory 'vendor' is already a git repository."; else git -C vendor init; git -C vendor add .gitkeep; git -C vendor commit -m 'persist'; fi ;

# cleanup, install, setup, build, test, tag
cp .env-dist .env
make CI docker-kill docker-rm docker-pull
make CI OPTS='--prefer-dist' app-install
make CI app-build-assets app-build-tests docker-build
make CI docker-up
make CI app-setup
make CI OPTS='-v acceptance prod' app-run-tests
export BUILDER_SERVICE_SUFFIX=src
make docker-tag
make docker-push

# get commit message
export LATEST_TAG=`git describe --abbrev=0`
export CURRENT_VERSION=`git describe`
export STACK_VERSION=`echo $CURRENT_VERSION | sed 's/\./-/g'`

# create tagged image
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
