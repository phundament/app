Docker containers with Vagrant
------------------------------

### Requirements

- Vagrant >= 1.7.0

### Get started!

[Download](https://github.com/phundament/app/tags) or clone:

    git clone https://github.com/phundament/app.git
    cd app

### Initialize

Setup your environment

    cp .env-dist .env

Get the `vendor` folder for development like so

    vagrant up db
    vagrant docker-run web -- composer install --prefer-dist

> Note! We manually start the `db` container since it's linked from the `web` container.

### Run

After initialization and setup you can bring up the containers

    vagrant up --no-parallel


Now, you're ready to access the application under
 
 - [frontend application](http://myapp-vagrant.192.168.7.6.xip.io)
 - [backend module](http://myapp-vagrant.192.168.7.6.xip.io/admin)

### Database migrations

To run your database migrations you have to open a bash in your `web` container with:

    vagrant docker-run -t web -- /bin/bash

On this bash you can run `yii` with:
    
    ./yii migrate



### Platform specific information
 
> #### Windows and OS X Users 
> 
> If you need to debug Docker, it is recommended to login to the *dockerhost* with 
> 
> OS X Users:
> ```
> VAGRANT_VAGRANTFILE=Vagrantfile-dockerhost vagrant ssh
> ``` 
> Windows Users:
> ```
> set VAGRANT_VAGRANTFILE=Vagrantfile-dockerhost && vagrant ssh
> ``` 
> 
> and run `docker` from there.
>
> If you want to reuse the Vagrant VM for your Docker containers across projects, follow these guidelines
>
> ```
> cp Vagrantfile-dockerhost \
>    ~/vagrant-docker-vm/Vagrantfile
> ```
>
> and update the `docker.vagrant_vagrantfile` setting in your `Vagrantfile`.
>

---

> #### Linux Users
>
> Our Vagrant `vagrant-docker-vm` registers a private network interface with the IP `192.168.7.6`.
> If you'd like to use your system docker installation comment the `docker.vagrant_vagrantfile` sections in the `Vagrantfile`
> in the project root folder. 

---

> #### Reading values from fig setup
>
> You can also load values from a  `fig.yml` into a `Vagrantfile` if you need to support both setups...
> 
>     require "yaml"
>     fig = YAML.load(File.open(File.join(File.dirname(__FILE__), "fig.yml"), File::RDONLY).read)
>
> Assign a parameter from a fig file...
> 
>     docker.env = {
>       "VIRTUAL_HOST" => fig["api"]["environment"]["VIRTUAL_HOST"]
>     }


