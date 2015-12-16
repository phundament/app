#!/bin/bash

set -e

make TEST setup up
make TEST run-tests codecept_opts='functional dev --html=_report_acceptance.html'
make TEST run-tests codecept_opts='acceptance dev --html=_report_acceptance.html'

exit 0
