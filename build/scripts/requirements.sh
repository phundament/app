#!/usr/bin/env bash

set -e

# Credits to Dennis Williamson - http://stackoverflow.com/a/4025065/291573
vercomp () {
    if [[ "$1" == "$2" ]]
    then
        return 0
    fi
    local IFS=.
    local i ver1=($1) ver2=($2)
    # fill empty fields in ver1 with zeros
    for ((i=${#ver1[@]}; i<${#ver2[@]}; i++))
    do
        ver1[i]=0
    done
    for ((i=0; i<${#ver1[@]}; i++))
    do
        if [[ -z ${ver2[i]} ]]
        then
            # fill empty fields in ver2 with zeros
            ver2[i]=0
        fi
        if ((10#${ver1[i]} > 10#${ver2[i]}))
        then
            return 1
        fi
        if ((10#${ver1[i]} < 10#${ver2[i]}))
        then
            return 2
        fi
    done
    return 0
}

echo "Checking system requirements..."

# Check docker-compose
DOCKER_COMPOSE_MIN_VERSION=1.5.2
[[ $(docker-compose --version) =~ version(.*), ]] && export DOCKER_COMPOSE_VERSION=${BASH_REMATCH[1]}
vercomp "${DOCKER_COMPOSE_VERSION}" "${DOCKER_COMPOSE_MIN_VERSION}"
[[ $? != 2 ]] && echo "[OK] docker-compose ${DOCKER_COMPOSE_VERSION}" || echo "[ERROR] docker-compose ${DOCKER_COMPOSE_MIN_VERSION} required"

exit 0