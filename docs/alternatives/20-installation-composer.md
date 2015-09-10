Installation Alternatives
-------------------------


### Composer installation

You can install _Phundament 4_ using [composer](https://getcomposer.org/download/)...

    composer global require "fxp/composer-asset-plugin:1.0.0"
    composer create-project --stability=beta phundament/app myapp

Create and adjust your environment configuration, eg. add a database...

    cd myapp
    cp .env-dist .env
    edit .env
    
Run the application setup...
    
    ./yii migrate --interactive=0
    ./yii app/setup-admin-user --interactive=0
    
Open `http://path-to-app/web` or `http://path-to-app/web?r=admin` in your browser.

