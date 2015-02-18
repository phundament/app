#!/bin/sh
echo `git describe --tags --dirty="-dev"` > version

docker-compose build testweb
docker-compose up -d testweb
docker exec app_testweb_1 codecept build
# wait for webserver
sleep 10

docker exec app_testweb_1 codecept run
docker-compose stop testweb testdb