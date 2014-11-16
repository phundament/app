Docker container with vagrant
-----------------------------

> Depending on your operating system, vagrant takes care about the required Docker setup.

#### Initialize

> Recommended first time setup with a dedicated Docker-Host for Vagrant:

> ```
cp ./platforms/vagrant-docker/dockerhost-vm/Vagrantfile \
   ~/dockerhost-vm/Vagrantfile
  ```

> And set your environment variable `DOCKER_HOST_VAGRANTFILE` to `~/dockerhost-vm/Vagrantfile`.

Setup the app:

    cp ./platforms/docker/Dockerfile .
    cp ./platforms/vagrant-docker/Vagrantfile .

#### Run

    vagrant up

#### Setup

    vagrant docker-run backend -- composer install --prefer-dist
    vagrant docker-run backend -- ./yii app/setup --interactive=0
