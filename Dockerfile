FROM phundament/php:5.6-cli-dev

# Remove installation source
RUN rm -rf /app
RUN rm -rf /app-src

# Prepare composer
# /!\ Note: Please add your own API token to config.json; Phundament comes with a public token for your convenince, which may hit a rate limit
ADD ./build/composer/config.json /root/.composer/config.json

# Install packages first
ADD ./composer.lock ./composer.json /app/
RUN /usr/local/bin/composer install --prefer-dist --optimize-autoloader

# Add application code
ADD src web /app/
