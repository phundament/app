#!/usr/bin/env bash

set -e

## Tag source container
export BUILDER_SERVICE_SUFFIX=src
cp .env-dist .env

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
    make docker-tag IMAGE_VERSION=$CURRENT_VERSION
    make docker-push IMAGE_VERSION=$CURRENT_VERSION
    echo "Image pushed to registry."
else
    echo "No stable tag found."
fi;