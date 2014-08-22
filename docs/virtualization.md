Virtualization
==============

Install via Vagrant on a virtual-, cloud- or remote-server
----------------------------------------------------------

Use an exsting Phundament 4 project or create-project a new one.

Go to [PuPHPet](https://puphpet.com/)

- Adjust Apache Virtual Host

  ```
  app.com.vagrant
  /var/www/frontend/web
  ```
- Click Install Xdebug
- Click Create
- Download VM Image Configuration
- Extract
- Copy files to Phundament project-root

###

Add `puphpet/files/exec-once`

    composer create-project

Update your `/etc/hosts` file:

~~~
192.168.33.101    app.com.vagrant
~~~


Bring up the virtual machine:

~~~
cd app
vagrant up
~~~


Open [phundament.vagrant](http://192.168.33.101/phundament.vagrant) or [http://192.168.33.101](http://192.168.33.101) in your browser.

```
http://192.168.77.102/frontend/web/
```


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

