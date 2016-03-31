#!/usr/bin/env bash

# Credits to Dennis Williamson - http://stackoverflow.com/a/4025065/291573
# DO NOT set -e
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

echo "Checking system requirements"

# Check docker
set -e
echo "Docker daemon..."
(docker ps -q && echo "[OK]") || (echo "Create or start your Docker host with docker-machine, get the latest version from https://github.com/docker/machine/releases" && exit 1)
set +e

# Check docker-compose
echo "docker-compose..."
DOCKER_COMPOSE_MIN_VERSION=1.6.2
if [[ $(docker-compose --version) =~ version[:]?\ ([^,]*)[,]? ]]; then
    DOCKER_COMPOSE_VERSION=${BASH_REMATCH[1]}
    echo "${DOCKER_COMPOSE_VERSION} >= ${DOCKER_COMPOSE_MIN_VERSION}"
    vercomp "${DOCKER_COMPOSE_VERSION}" "${DOCKER_COMPOSE_MIN_VERSION}"
    RESULT=$?
    if [[ $RESULT != 2 ]]; then
        echo "[OK] docker-compose ${DOCKER_COMPOSE_VERSION}"
    else
        echo "[ERROR] docker-compose ${DOCKER_COMPOSE_MIN_VERSION} required, get the latest version from https://github.com/docker/compose/releases"
        exit 1
    fi
else
    echo "[ERROR] could not determine docker-compose version"
    exit 1
fi

exit 0