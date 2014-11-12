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

Copy fig and Dotenv config to project root:

    cp ./environments/_docker/fig.yml .
    cp ./environments/_docker/.env .

You may edit the `.env` file to update environment parameters.

> Note: Entries in `fig.yml` are **not overwritten** by `.env`.

To initialize your application run the following commands once:

> Note: If you are developing on OS X, make sure your host-vm is running (`boot2docker start`).

    fig run backend ./yii app/setup --interactive=0

They will make the `vendor` folder available in your project directory on your host machine.
And sets up the database, along with an admin user.

### Start application

    fig up -d

You should now be able to access the container under `http://docker.local:40080` and `http://docker.local:40081`

> On Linux `docker.local` is usually equal to `localhost`, on OS X the command `echo $DOCKER_HOST` should print the IP of your host VM.

> Default [Dockerfile](https://github.com/phundament/docker) for Phundament 4 Apps.
