VERSION=`git describe --tags``test -z "$(git status --porcelain)" || echo "-dirty"`
echo $VERSION > version

docker-compose build testweb
docker-compose up -d testweb
docker exec app_testweb_1 codecept build
# wait for webserver
sleep 10
docker exec app_testweb_1 codecept run
docker-compose stop testweb testdb