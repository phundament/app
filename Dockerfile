FROM phundament/php:5.6-cli-4.0.0-dev

# Install PHP extensions
# TODO: Install imagemagick
#RUN apt-get update && \
#    apt-get -y install \
#            libmagickwand-dev \
#        --no-install-recommends && \
#    rm -r /var/lib/apt/lists/*
#RUN pecl install imagick-beta

# Prepare composer
# /!\ Note: Please add your own API token to config.json; Phundament comes with a public token for your convenince, which may hit a rate limit
ADD ./build/composer/config.json /root/.composer/config.json

# Install packages first
ADD ./composer.lock /app/composer.lock
ADD ./composer.json /app/composer.json
RUN /usr/local/bin/composer install --prefer-dist --optimize-autoloader

# Add application code
ADD . /app
