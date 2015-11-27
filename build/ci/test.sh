#!/bin/bash

# ENV settings
export COMPOSE_HTTP_TIMEOUT=120
export APP_MIGRATION_LOOKUP=@root/tests/codeception/_migrations

# Cleanup, install, setup, build, test, tag
make TEST setup up
make TEST run-tests codecept_opts='unit prod --html=_report_unit.html'
make TEST run-tests codecept_opts='acceptance prod --html=_report_acceptance.html'

exit 0
