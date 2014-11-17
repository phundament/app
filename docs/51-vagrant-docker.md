Docker containers with vagrant
-----------------------------

> **Note! This section is under development and requires `Vagrant >= 1.7.0-dev`**

### Initialize

> #### Windows and OS X Users Only
> Recommended first time setup with a dedicated Docker-Host for Vagrant:
>
> ```
> cp ./platforms/vagrant-docker/dockerhost-vm/Vagrantfile \
>    ~/dockerhost-vm/Vagrantfile
> ```
>
> And set your environment variable `DOCKER_HOST_VAGRANTFILE=~/dockerhost-vm/Vagrantfile`.
> For some Vagrant versions you may also need to set `DOCKER_TLS_VERIFY=0`.
>
> **Please also make sure to start your `dockerhost-vm` manually _before_ starting the Docker containers:
>
> ```
> cd ~/dockerhost-vm
> vagrant up
> ```

Setup the app:

    cp .env-dist .env
    cp ./platforms/vagrant-docker/Vagrantfile .

### Run

    vagrant up

### Setup

    vagrant docker-run backend -- composer install --prefer-dist
    vagrant docker-run backend -- ./yii app/setup --interactive=0
