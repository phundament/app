Docker containers with Vagrant
------------------------------

> **Note! This section is under development and requires `Vagrant >= 1.6.5-dev`**

### Get started!

[Download](https://github.com/phundament/app/tags) or clone:

    git clone https://github.com/phundament/app.git
    cd app

### Initialize

> #### Windows and OS X Users Only
>
> Recommended first time setup with a dedicated `dockerhost-vm` for Vagrant:
>
> ```
> cp ./platforms/vagrant-docker/dockerhost-vm/Vagrantfile \
>    ~/dockerhost-vm/Vagrantfile
> ```
>
> And set your environment variable `DOCKER_HOST_VAGRANTFILE=~/dockerhost-vm/Vagrantfile`.
>
> ```
> cd ~/dockerhost-vm
> vagrant up
> ```

Setup the your environment:

    cp .env-dist .env
    cp ./platforms/vagrant-docker/Vagrantfile .

**Since Vagrant <=1.6.5 has issues, with simulateous Docker containers, we recommend to start only the `db` container first, to bring up the `dockerhost-vm` _before_ starting the rest of the Docker containers:**

    vagrant up db --provider=docker

When the database container is running, initialize the application and setup the the database:

    vagrant docker-run backend -- composer install --prefer-dist
    vagrant docker-run backend -- ./yii app/setup --interactive=0

### Run

After initialization and setup you can bring up the containers:

    vagrant up backend --provider=docker
    vagrant up frontend --provider=docker

> #### Windows and OS X Users Only
>
> Our Vagrant `dockerhost-vm` registers a private network interface with the IP `192.168.7.6`, we recommend setting up a entry in `/etc/hosts` with `192.168.7.6 doccker.vagrant`

Now, you're ready to access the [frontend application](http://docker.vagrant:22280) or [backend application](http://docker.vagrant:22281).
