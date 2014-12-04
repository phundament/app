Docker containers with fig
-------------------------

> NOTE! This section is under development

### Requirements

- [Docker](https://www.docker.com) (Linux) or [Boot2docker](http://boot2docker.io) (OS X, Windows)
- [fig](http://www.fig.sh)

### Get started!

[Download](https://github.com/phundament/app/tags) or clone:

    git clone https://github.com/phundament/app.git
    cd app

#### Initialize

Copy fig and Dotenv config to project root:

    cp ./platforms/fig/fig.yml .
    cp ./platforms/fig/.env .

You may edit the `.env` file to update environment parameters.

> Note: Entries in `.env` will be **overwritten** by `fig.yml`.

To initialize your application run the following commands once:

> Note: If you are developing on OS X or Windows, make sure your host-vm is running in VirtualBox Manager or with `boot2docker start`.

    fig run web composer create-project --prefer-dist
    fig run web ./yii app/setup --interactive=0

They will make the `vendor` folder available in your project directory on your host machine.
And sets up the database, along with an admin user.

> You can replace the [Phundament 4 Docker image](https://github.com/phundament/docker) with your custom base container.


#### Run

    fig up -d

You should now be able to access the application under 

Linux

- [myapp-fig.127.0.0.1.xip.io](http://myapp-fig.127.0.0.1.xip.io)
- [myapp-fig.127.0.0.1.xip.io/backend](http://myapp-fig.127.0.0.1.xip.io/backend)

OS X, Windows

- [myapp-fig.192.168.59.103.xip.io](http://myapp-fig.192.168.59.103.xip.io)
- [myapp-fig.192.168.59.103.xip.io/backend](http://myapp-fig.192.168.59.103.xip.io/backend)

> On Linux `docker.local` is usually equal to `localhost`, on OS X the command `echo $DOCKER_HOST` should print the IP of your host VM.


### Virtual hosts with Docker

To automatically create virtual hosts for your projects, you can use a combination of this [nginx-proxy](https://registry.hub.docker.com/u/jwilder/nginx-proxy/)
image and [xip.io](http://xip.io).

First, run the container like described in its README, before you start web application containers.

```
docker pull jwilder/nginx-proxy
docker run -d -p 80:80 -v /var/run/docker.sock:/tmp/docker.sock jwilder/nginx-proxy
```

There are virtual hosts prepared in `fig.yml` for the web-applications, adjust the IPs if needed:
 
```
environment:
    VIRTUAL_HOST: phundament.127.0.0.1.xip.io,phundament.192.168.59.103.xip.io
```
 
You should be able to access your web-application under `http://phundament.127.0.0.1.xip.io`. 
