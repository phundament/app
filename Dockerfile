FROM phundament/app:development

# Prepare composer
# /!\ Note: Please add your own API token to config.json; Phundament comes with a public token for your convenince, which may hit a rate limit
ADD ./build/composer/config.json /root/.composer/config.json

# Install packages first
ADD ./composer.lock /app/composer.lock
ADD ./composer.json /app/composer.json
RUN /usr/local/bin/composer install --prefer-dist --dev --optimize-autoloader

# Add application code
ADD . /app

# Easy PaaS setup
ENV DB_ENV_MYSQL_DATABASE dev-myapp
