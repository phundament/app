Docker containers with fig (docker-compose)
-------------------------------------------

> NOTE! This section is under development

### Requirements

- [Docker](https://www.docker.com) (Linux) or [Boot2docker](http://boot2docker.io) (OS X, Windows)
- [fig](http://www.fig.sh)

### Get started!

[Download Phundament](https://github.com/phundament/app/tags) or clone:

    git clone https://github.com/phundament/app.git myapp-fig
    cd myapp-fig

#### Initialize

Copy fig and Dotenv config to project root:

    cp .env-dist .env

You may edit the `.env` file to update environment parameters.

> Note: Values of ENV variables defined in `fig.yml` have precedence over `.env`.

To initialize your application run the following commands once:

> Note: If you are developing on OS X or Windows, make sure your host-vm is running in VirtualBox Manager or with `boot2docker start`.

    fig run web composer create-project --prefer-dist

They will make the `vendor` folder available in your project directory on your host machine.
And sets up the database, along with an admin user.


#### Run

Bring up the `web` container

    fig up -d web

and check it's port with

    fig ps
    
If you'd like to have zero-configuration access via virtual-hosts, see the *[Automated virtual hosts with Docker](51-docker-virtual-hosts.md)* section.    