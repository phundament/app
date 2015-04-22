## Kickstart


First pull the latest version of the Phundament PHP CLI image

    docker pull phundament/php

To create a new application we copy the application template source from the image to a host-volume in the current
working directory 
   
    mkdir kickstart && cd kickstart
    docker run --rm -v `pwd`:/app phundament/php cp -r /app-src/. /app

       
       
Create a git repository, so you can track your changes from the beginning. Initialize a repo for your new project

    git add .
    git commit -m "inital commit"
    git remote add origin git@github.com:phundament/playground.git
    git push -u origin master


Start the stack in the background
    
    docker-compose up -d

Find webserver port
            
    docker-compose port web 80

Open application

    
    open http://docker.local:32774
    
    

    
    

    
Setup LESS watcher
    
    @brand-primary
    
Update styles and views ...
    
... add module.
   

Start container     
     
    docker-compose up web && docker-compose ps

Open in browser    
    
    open http://myapp.192.168.59.106.xip.io

Testing    
    
    docker-compose up -d testweb && docker exec kickstart_testweb_1 codecept run
        
Access [myapp.192.168.59.103.xip.io](http://myapp.192.168.59.103.xip.io) Or check the container port with `docker-compose ps`.


Add Test
--------




Building
--------

Update build tags in `build/docker-build.sh`.


Run `sh build/docker-build.sh`



docker build -t tutum.co/herzog/lab-hrzg-de:0.0.3 .
fig up -d lab




http://docs.docker.com/compose/install/





---

### Develop

    docker-compose up

### Test

    sh build/docker-test.sh

### Build
    
    sh build/docker-image.sh

### Deploy
    
    sh build/docker-image.sh
