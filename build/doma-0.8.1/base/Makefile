# doma base
# =========

.PHONY: default help

# Help based on https://gist.github.com/prwhite/8168133 thanks to @nowox and @prwhite
# And add help text after each target name starting with '\#\#'
# A category can be added with @category

HELP_FUN = \
		%help; \
		while(<>) { push @{$$help{$$2 // 'options'}}, [$$1, $$3] if /^([\w-]+)\s*:.*\#\#(?:@([\w-]+))?\s(.*)$$/ }; \
		print "\nusage: make [target]\n\n"; \
	for (keys %help) { \
		print "$$_:\n"; \
		for (@{$$help{$$_}}) { \
			$$sep = "." x (25 - length $$_->[0]); \
			print "  $$_->[0]$$sep$$_->[1]\n"; \
		} \
		print "\n"; }

default: help

help:				##@base Show this help
	#
	# General targets
	#
	@perl -e '$(HELP_FUN)' $(MAKEFILE_LIST)

.PHONY: confirm
confirm:
	@while [ -z "$(DOMA_ENVIRONMENT)" ] && [ -z "$$yesno" ] ; do \
        read -r -p "/!\ WARNING /!\ Do you really want to continue? [y/N] " yesno ; \
        if [ -z "$$yesno" ] ; then \
        	yesno=n ; \
        fi ; \
    done ; \
	if [ -n "$(DOMA_ENVIRONMENT)" ] || [ $$yesno = "y" ] || [ $$yesno = "Y" ] ; then \
		echo "Approved."; \
	else \
		echo "Aborted." ; \
		exit 1 ; \
	fi

# Config targets
# --------------

.PHONY: NON-INTERACTIVE
NON-INTERACTIVE:	##@config Do not ask for confirmation
	$(eval DOMA_ENVIRONMENT := non-interactive)
	@#


# Doma targets
# ------------

doma-version:		##@doma Show doma version
	@cd $(DOMA_DIR) && echo "дома `git describe`"

doma-selfupdate:	##@doma Update doma (only works with git repo)
	@cd $(DOMA_DIR) && echo "Current version: `git describe`" && git pull && echo "New version: `git describe`"
