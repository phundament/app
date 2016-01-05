#!/usr/bin/env bash

if [ -n "${GITHUB_API_TOKEN}" ]
then
    composer config -g github-oauth.github.com ${GITHUB_API_TOKEN}
fi

composer "$@"