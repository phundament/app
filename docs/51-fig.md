Docker Container with fig
-------------------------

> NOTE! This section is under development

[Download](https://github.com/phundament/app/tags) or clone:

    git clone https://github.com/phundament/app.git p4-fig
    cd p4-fig

Copy fig and Dotenv config to project root:

    cp ./environments/_docker/Dockerfile .
    cp ./environments/_docker/fig.yml .
    cp ./environments/_docker/.env .

You may edit `./.env` file to set environment parameters, like the application name.

> Note: If you are developing on OS X, make sure your host-vm is running (`boot2docker start`).

To initialize your application run the following commands once:

    fig run backend ./init --env=Dotenv --overwrite=n && composer install --prefer-dist
    fig run backend ./yii app/setup

They will make the `vendor` folder available in your project directory on your host machine.
And sets up the database, along with an admin user.

Start the application containers in daemon mode with:

    fig up -d

You should now be able to access the container under `http://docker.local:10080` and `http://docker.local:10081`

> On Linux `docker.local` is usually equal to `localhost`, on OS X the command `echo $DOCKER_HOST` should print the IP of your host VM.

> Default [Dockerfile](https://github.com/phundament/docker) for Phundament 4 Apps.
