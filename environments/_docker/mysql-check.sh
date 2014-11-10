#!/bin/sh
while ! curl http://$DB_PORT_3306_TCP_ADDR:3306/
do
  echo "$(date) - still trying"
  sleep 1
done
echo "$(date) - connected successfully"