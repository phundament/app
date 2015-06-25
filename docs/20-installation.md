Installation
============


Setup a new project
--------------------

Clone the repository and go to the application directory

    git clone https://github.com/phundament/app

or [download](https://github.com/phundament/app/releases) 
    

Create environment configuration file

    cd app
    cp .env-dist .env

For the first initial setup run

    make all

On OS X your default browser should be opened at the end of the command.
On other systems, check the console output for the `appnginx` port or use `make docker-ps` or `docker ps` to find the public port.


Create a git repository
-----------------------

Initialize a repo for your new project

    export REMOTE=git@github.com:phundament/playground.git

    git init
    git add .
    git commit -m "inital commit"
    git remote add origin $REMOTE
    git push -u origin master 

---

*Continue to [Configuration](21-configuration.md)*