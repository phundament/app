#!/bin/bash

EXIT_CODE=0

set -e
make TEST setup up

set +e
set -v
make TEST run-tests codecept_opts='functional allow_fail --html=_report_allow_fail_functional.html' || EXIT_CODE=1
make TEST run-tests codecept_opts='acceptance allow_fail --html=_report_allow_fail_acceptance.html' || EXIT_CODE=1

set -e
exit ${EXIT_CODE}
