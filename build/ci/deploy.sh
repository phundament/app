#!/usr/bin/env bash

# Create tagged image from git tag
LATEST_TAG=`git describe --abbrev=0`
CURRENT_VERSION=`git describe`

# Create and push :latest
docker tag app_php phundament/app:latest
docker push phundament/app:latest

# Create and push :<CURRENT_VERSION>
if [ "$LATEST_TAG" = "$CURRENT_VERSION" ]; then
    echo "Stable tag $CURRENT_VERSION detected, tagging image..."
    docker tag app_php phundament/app:$CURRENT_VERSION
    docker tag app_php phundament/app:$CURRENT_VERSION
    docker push phundament/app:$CURRENT_VERSION
    echo "Image pushed to registry."
else
    echo "No stable tag found."
fi;