VERSION=`git describe --tags``test -z "$(git status --porcelain)" || echo "-dirty"`
echo $VERSION > version

fig build testweb
fig up -d testweb
docker exec app_testweb_1 codecept build
# wait for webserver
sleep 10
docker exec app_testweb_1 codecept run
fig stop testweb testdb