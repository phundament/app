#!/bin/bash

EXIT_CODE=0

set -e

make TEST up setup
make TEST clean-tests

set -v

set +e

mkdir -p -m 777 "${PWD}/tests/codeception/_output/debug"
make TEST run-tests codecept_opts='functional,unit,cli,acceptance -g mandatory --html=_report_mandatory.html' || EXIT_CODE=1

exit ${EXIT_CODE}
