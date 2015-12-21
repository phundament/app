#!/usr/bin/env bash

set -e

cp .env-dist .env

make build
make TEST clean

exit 0