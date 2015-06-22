
> **Heads up!** This section is under development.

    mkdir test-my-extension && cd test-my-extension
    
    docker run --rm -v `pwd`:/app phundament/app \
        sh -c 'cp -r /phundament-src/composer.json /app/composer.json'