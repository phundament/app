#!/usr/bin/env bash

sh /app/src/init.sh

echo "Container keep running to improve stack-stability, if you are running an interactive shell or one-off command use <ctrl+c> to exit."
tail -f /dev/null