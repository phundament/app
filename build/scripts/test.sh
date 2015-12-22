#!/bin/bash

EXIT_CODE=0

set -e
make TEST setup up
make TEST clean-tests

set +e
set -v
make TEST run-tests codecept_opts='unit prod --html=_report_unit.html' || EXIT_CODE=1
make TEST run-tests codecept_opts='functional prod --html=_report_functional.html' || EXIT_CODE=1
make TEST run-tests codecept_opts='acceptance prod --html=_report_acceptance.html' || EXIT_CODE=1

exit ${EXIT_CODE}
