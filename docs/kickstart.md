First pull the latest version of the container image

    docker pull phundament/app

Create a new application from the image and run it 
   
    mkdir kickstart && cd kickstart && docker run --rm -v `pwd`:/SRC phundament/app cp -r /app/. /SRC && docker-compose run --rm testweb codecept build
    
Create a git repository, so you can track your changes from the beginning. Initialize a repo for your new project

    git add .
    git commit -m "inital commit"
    git remote add origin git@github.com:phundament/playground.git
    git push -u origin master

Edit `docker-compose.yml`, adjust 
     
    VIRTUAL_HOST: ~^lab\.hrzg\.de.*\

Edit `.env`

    APP_ID
    APP_NAME
    
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










---

### Develop

    docker-compose up

### Test

    sh build/docker-test.sh

### Build
    
    sh build/docker-image.sh

### Deploy
    
    sh build/docker-image.sh
