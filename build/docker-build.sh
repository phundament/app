#!/bin/sh
echo `git describe --tags --dirty="-dev"` > version

docker build -f Dockerfile-production -t myapp-production .
docker build -f Dockerfile -t myapp-development .