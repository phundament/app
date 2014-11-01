Local VM with vagrant
---------------------

> NOTE! This section is under development

- Install [Vagrant](https://www.vagrantup.com) and [VirtualBox](https://www.virtualbox.org)
- Go to an exsting Phundament 4 project or `git clone https://github.com/phundament/app.git` a new one.
- Upload the default configuration from `environments/puphpet/config-dist.yaml` via drag&drop to [PuPHPet](https://puphpet.com/)
  - Adjust VM values if needed, eg. make sure to install `curl` and `gd`.
  - Click **Create** and download VM configuration package.
- Extract the contents (`Vagrantfile`,`puphpet/`) to the project root folder.
- Initialize application in puphpet environment:

    ```
    cp ./environments/_puphpet/puphpet/files/exec-once/init.sh ./puphpet/files/exec-once/init.sh
    ```

    *Note: This will copy the needed initialization script for the VM, which will switch your environment to _Development_ by default.*
- To access the virtual host in the VM later, update your `/etc/hosts` file:

    ```
    192.168.42.42    phundament.vagrant admin.phundament.vagrant
    ```
- Bring up the virtual machine:

    ```
    vagrant up
    ```
- Open [phundament.vagrant](http://phundament.vagrant) or [admin.phundament.vagrant](http://admin.phundament.vagrant) in your browser.
- Login with `admin` / `admin1234`


### Accessing application in virtual machine

To open a shell in the VM run:

```
vagrant ssh
```

You can run commands directly in the virtual machine, eg.:

```
vagrant ssh --command "/var/www/yii"
```

