# doma - Makefile template for AWS CLI
# =========================================
#

.PHONY: AWS CLI

AWS?=docker run --rm -t -i -v $(shell pwd)/.awscreds:/root/.aws -v $(shell pwd):$(shell pwd) alexturek/aws-cli-docker

.PHONY: aws-setup
aws-setup:
	$(AWS) configure

.PHONY: aws
aws:
	$(AWS) $(cmd)

.PHONY: aws-create-user
aws-create-user:
	$(AWS) iam create-user --user-name $(username)

.PHONY: aws-set-user-policy
aws-set-user-policy:
	$(AWS) iam put-user-policy --user-name $(username) --policy-name $(name) --policy-document $(document)

.PHONY: aws-show-user-policy
aws-show-user-policy:
	$(AWS) iam list-user-policies --user-name $(username)

.PHONY: aws-create-bucket
aws-create-bucket:
	$(AWS) s3 mb s3://$(bucket)

.PHONY: aws-remove-bucket
aws-remove-bucket:
	$(AWS) s3 rb s3://$(bucket)

.PHONY: aws-remove-force-bucket
aws-remove-force-bucket:
	$(AWS) s3 rb s3://$(bucket) --force

