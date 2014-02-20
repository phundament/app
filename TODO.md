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

 * Describe Amazon Deployment
  * Check connection settings in EC2 management console
  * Testing (free) instance only available from `region: us-west-2`(?) US West (Oregon)
  * Test SSH, instance needs Security Group `launch-wizard-1`
  * Update `puphpet/config.yaml` with your keys
    * [EC2 Access Key ID](https://console.aws.amazon.com/iam/home?#security_credential)
    * [EC2 Secrect Access Key](https://portal.aws.amazon.com/gp/aws/securityCredentials?)
    * [EC2 Key Pair Name](https://console.aws.amazon.com/ec2/v2/home?#KeyPairs:)
    * Local Private Key Path (on your machine)
    * adjust EC2 Security groups, if needed

  > ToDo: "Intelligent folder sync" (vendor, assets?)

