#!/bin/bash

EXIT_CODE=0

set -e
make TEST setup up

set +e
set -v
make TEST run-tests codecept_opts='unit,functional,acceptance -g optional --html=_report_optional.html' || EXIT_CODE=1
set -e
exit ${EXIT_CODE}
