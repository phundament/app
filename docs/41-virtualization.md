Virtualization
==============

Phundament uses [Vagrant](https://www.vagrantup.com), [VirtualBox](https://www.virtualbox.org) and [PuPHPet](https://puphpet.com) on a Debian Wheezy installation for its default virtualization configuration.

But thanks to the flexibility of the above tools you should be able to choose from a wide variety of available components, including VMWare, Parallels, HyperV, RedHat, Amazon AWS, DigitalOcean, Rackspace and many more.


Local virtualization
--------------------

- Use an exsting Phundament 4 project or `git clone` a new one.
- Create a virtual machine on [PuPHPet](https://puphpet.com/).
- Upload the configuration from `environments/puphpet/config.yaml` via drag&drop and ajdust it if needed.
  - Make sure to install curl, gd
- Click **Create** and download VM configuration package
- Extract
- Copy contents to Phundament project root folder
- Go to project folder and copy initialization script

    ~~~
    cd app
    cp environments/virtual/puphpet/files/exec-once/init.sh puphpet/files/exec-once/init.sh
    ~~~
- Update your `/etc/hosts` file:

    ~~~
    192.168.42.42    phundament.vagrant admin.phundament.vagrant
    ~~~
- Bring up the virtual machine:

    ~~~
    vagrant up
    ~~~
- Open [phundament.vagrant](http://phundament.vagrant) or [admin.phundament.vagrant](http://admin.phundament.vagrant) in your browser.
- Login with `admin` / `admin1234`


Cloud installations
-------------------

### AWS EC2 deployment

#### Setup

Install the following Vagrant plugins

    vagrant plugin install vagrant-aws
    vagrant plugin install vagrant-awsinfo

Check connection settings in EC2 management console and update the puphpet config variables with your data.
You may use the base configuration from `environments/virtual` and switch to AWS in the **Deploy Target** section

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

