fig build testweb
fig up -d testweb
docker exec app_testweb_1 codecept build
# wait for webserver
sleep 10
docker exec app_testweb_1 codecept run