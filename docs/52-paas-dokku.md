Dokku
======

> NOTE! This section is under development

Phundament 4 comes with built-in support for some PaaS providers thanks to the [yii-dna-deployment](https://github.com/neam/yii-dna-deployment) extension.

The basic approach is that you will push the code to a git remote at your PaaS provider, and they will use the "heroku" metadata in composer.json to build a fully working virtual machine running the application.

### Deploy using Dokku

Phundament 4 has been verified to work with Dokku hosts provisioned by [https://github.com/neam/dokku-host-provisioning](). Follow it's readme to provision a Dokku host, then set your dokku host in an environment variable:

    export DOKKU_HOST=dokku.example.com

Now choose a appname/subdomain for your deployment and create the app:

    export APPNAME=phundament4-foo1
    ssh dokku@$DOKKU_HOST create $APPNAME

Set necessary config:

    export COMPOSER_GITHUB_TOKEN="replaceme" # see https://getcomposer.org/doc/articles/troubleshooting.md#api-rate-limit-and-oauth-tokens

    ssh dokku@$DOKKU_HOST config:set $APPNAME \
        CONFIG_INCLUDE=config/paas/include.php \
        COMPOSER_GITHUB_TOKEN=$COMPOSER_GITHUB_TOKEN \
        NGINX_VHOSTS_CUSTOM_CONFIGURATION=deploy/neam/yii-dna-deployment/nginx-vhosts-custom-configuration.conf.erb

    # add persistent folder to running container (not recommended dokku-practice, but necessary until p3media is replaced with a fully network-based-solution)

    options="-v $DOKKU_ROOT/$APPNAME/cache:/cache"
    ssh dokku@$DOKKU_HOST docker-options:add $APPNAME $options

Push your code to your dokku host:

    git push dokku@$DOKKU_HOST:$APPNAME $CURRENT_BRANCH:master

At this stage the docker instance is prepared and runs the cms yii application, but if this is the first deployment, there is no database configured.

Add a database:

    ssh dokku@$DOKKU_HOST mariadb:create $APPNAME

Run migrations and create an admin user to get a working deployment:

    ssh dokku@$DOKKU_HOST config:set $APPNAME ADMIN_EMAIL=admin123@example.com
    ssh dokku@$DOKKU_HOST config:set $APPNAME ADMIN_DEFAULT_PASSWORD=admin123
    ssh dokku@$DOKKU_HOST run $APPNAME ./yii migrate --interactive=0
    ssh dokku@$DOKKU_HOST run $APPNAME ./yii app/admin-user --interactive=0

#### Useful commands in order to interact with a dokku deployment

To show the current config and docker-options:

    ssh dokku@$DOKKU_HOST config $APPNAME
    ssh dokku@$DOKKU_HOST docker-options $APPNAME

To update a dokku deployment, push to it's dokku repository:

    git push dokku@$DOKKU_HOST:$APPNAME $CURRENT_BRANCH:master

To reset the db to a clean state:

    export DATA=clean-db
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST config:set $APPNAME DATA=$DATA
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST run $APPNAME bash /app/vendor/neam/yii-dna-deployment/dokku-reset-db.sh

To reset the db and load user data:

    export DATA=user-generated
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST config:set $APPNAME DATA=$DATA
    # run these commands one by one (they will not all run if pasted into the console together)
    ssh dokku@$DOKKU_HOST run $APPNAME bash /app/vendor/neam/yii-dna-deployment/dokku-reset-db.sh

To run the tests:

    # needs to be set appropriately (see above in readme)
    export COVERAGE=basic

    # use ci-configuration for deployment while running tests
    ssh dokku@$DOKKU_HOST config:set $APPNAME CONFIG_ENVIRONMENT=ci

    # run tests within a dokku app container
    ssh dokku@$DOKKU_HOST run $APPNAME /app/deploy/dokku-run-tests.sh $COVERAGE

    # restore config-environment
    ssh dokku@$DOKKU_HOST config:set $APPNAME CONFIG_ENVIRONMENT=$CMS_CONFIG_ENVIRONMENT

To upload the current user-generated data to S3, run:

    ssh dokku@$DOKKU_HOST run $APPNAME /app/shell-scripts/upload-user-data-backup.sh