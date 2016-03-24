#!/usr/bin/env bash

EXIT_CODE=0
DIRNAME=$(dirname "$0")

DOCKERFILE_PATH=.
DOCKERFILE=Dockerfile

pushd "${DIRNAME}/../.."

set -v

# Makefiles
make
make help
make -n all

# Dockerfiles
docker run --rm -v "${PWD}/${DOCKERFILE_PATH}/${DOCKERFILE}":/Dockerfile:ro redcoolbeans/dockerlint
docker run --rm --privileged -v "${PWD}/${DOCKERFILE_PATH}:/root/" projectatomic/dockerfile-lint dockerfile_lint -f ${DOCKERFILE}

# composer packages
docker-compose run --rm php composer diagnose || EXIT_CODE=1
docker-compose run --rm php composer show -i || EXIT_CODE=1
docker-compose run --rm php climb || EXIT_CODE=1

# PHP source
docker-compose run --rm php vendor/bin/php-cs-fixer fix --dry-run --format=txt -v src || EXIT_CODE=1
docker run --rm -v "${PWD}:/project" jolicode/phaudit phploc src/
docker run --rm -v "${PWD}:/project" jolicode/phaudit phpcpd src/
docker run --rm -v "${PWD}:/project" jolicode/phaudit phpdcd src/
docker run --rm -v "${PWD}:/project" jolicode/phaudit phpmetrics src/

# shell scripts
docker run --rm -v "${PWD}/build/scripts/lint.sh:/tmp/FileToBeChecked" chrisdaish/shellcheck || EXIT_CODE=1
docker run --rm -v "${PWD}/build/scripts/test.sh:/tmp/FileToBeChecked" chrisdaish/shellcheck || EXIT_CODE=1
docker run --rm -v "${PWD}/build/scripts/deploy.sh:/tmp/FileToBeChecked" chrisdaish/shellcheck || EXIT_CODE=1
docker run --rm -v "${PWD}/build/scripts/requirements.sh:/tmp/FileToBeChecked" chrisdaish/shellcheck || EXIT_CODE=1

set +v

exit ${EXIT_CODE}