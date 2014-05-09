Phundament 4.0-dev Todo List
============================

Bugs
----

 * ~~cleanup dependencies after fixing https://github.com/yiisoft/yii2/issues/2465~~

Features
--------

 * add login with github, Google, Facebook, Twitter
 * add user-management extension (yii2-usr?)
 * add rights-management extension
 * add image/file manager extension
 * theme examples

Docs
----

### AWS EC2 deployment

#### Setup

Install the following Vagrant plugins

    vagrant plugin install vagrant-aws
    vagrant plugin install vagrant-awsinfo

Check connection settings in EC2 management console and update `ENV` variables or `puphpet/config.yaml` with your data
  * [EC2 Access Key ID](https://console.aws.amazon.com/iam/home?#security_credential)
  * [EC2 Secrect Access Key](https://portal.aws.amazon.com/gp/aws/securityCredentials?)
  * [EC2 Key Pair Name](https://console.aws.amazon.com/ec2/v2/home?#KeyPairs:)
  * Local Private Key Path (on your machine)
  * adjust EC2 Security groups, if needed (eg. instance needs Security Group `launch-wizard-1`)

#### Provisioning

    vagrant up --provider=aws

> Note: You can only have one provider per machine.
> See also http://docs.vagrantup.com/v2/providers/basic_usage.html (Limitations)

#### Troubleshooting

  * Testing (free) instance only available from `region: us-west-2`(?) US West (Oregon)
  * "Intelligent folder sync" (excluding vendor, web/assets...) Note: needs vagrans-aws >0.4.1 - no tag at the moment



