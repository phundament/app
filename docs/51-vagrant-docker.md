Docker container with vagrant
-----------------------------


> #### Windows and OSX Users Only
> Recommended first time setup with a dedicated Docker-Host for Vagrant:

> ```
cp ./platforms/vagrant-docker/dockerhost-vm/Vagrantfile \
   ~/dockerhost-vm/Vagrantfile
  ```
  
> And set your environment variable `DOCKER_HOST_VAGRANTFILE` to `~/dockerhost-vm/Vagrantfile`.
> For some Vagrant versions you need to set `DOCKER_TLS_VERIFY=0`.

### Initialize

Setup the app:

    cp ./platforms/vagrant-docker/Vagrantfile .

### Run

    vagrant up

### Setup

    vagrant docker-run backend -- composer install --prefer-dist
    vagrant docker-run backend -- ./yii app/setup --interactive=0
