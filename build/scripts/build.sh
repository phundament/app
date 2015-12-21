#!/usr/bin/env bash

set -e

cp .env-dist .env

make clean build
make TEST clean

exit 0