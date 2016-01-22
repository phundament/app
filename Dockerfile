FROM phundament/php-one:5.6-fpm-4.6.0

RUN apt-get update \
 && apt-get install -y \
        libpq5 \
        libpq-dev \
        --no-install-recommends \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
 && docker-php-ext-install pdo_pgsql

# Clean eventually orphaned files and remove installation source
RUN rm -rf /app/src /app/web /app-src

# Prepare container
# /!\ Note: Please add your own API token to config.json
# Phundament comes with a public token for your convenince which may hit the GitHub rate limit
ADD ./build/container-files/ /

# Install application packages, if there are changes the composer files
ADD ./composer.lock ./composer.json /app/
RUN /usr/local/bin/composer install --prefer-dist --optimize-autoloader

# Add application code
ADD .env-dist /app/.env
ADD yii /app/
ADD web /app/web
ADD src /app/src
ADD version /app/version

# Create folder writable by the application (non-persistent data)
RUN mkdir -p /app/web/assets /app/runtime \
 && chmod 777 /app/web/assets /app/runtime \
 && echo "alias composer='sh /app/src/composer.sh'" >> /root/.bashrc
