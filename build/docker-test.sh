#!/bin/sh

pushd `dirname $0`/..
./yii app/version
source .env

#docker-compose -p ${APP_ID} -f build/test.yml rm testdb

docker-compose -p ${APP_ID} -f build/test.yml build
docker-compose -p ${APP_ID} -f build/test.yml up -d
docker exec ${APP_ID}_testweb_1 codecept build

# wait for server, since the container may be up, but not yet ready
echo "Trying to connect to server (max. 10 times)..."
while ! curl -s /dev/null http://test-myapp.192.168.59.103.xip.io
do
  echo "$(date) - still trying"
  ((c++)) && ((c==10)) && exit
  sleep 1
done
echo "$(date) - connected successfully"

docker exec ${APP_ID}_testweb_1 codecept run
#docker-compose -p ${APP_ID} -f build/test.yml stop

popd