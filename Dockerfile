FROM phundament/php-one:5.6-fpm-5.1.1

# Clean eventually orphaned files and remove installation source
RUN rm -rf /app/src /app/web /app-src

# Prepare container
# /!\ Note: Please add your own API token to config.json
# Phundament comes with a public token for your convenience which may hit the GitHub rate limit
COPY ./build/container-files/ /

# Install application packages, if there are changes the composer files
COPY ./composer.lock ./composer.json /app/
RUN /usr/local/bin/composer install --prefer-dist --optimize-autoloader

# Add application code
COPY .env-dist /app/.env
COPY yii /app/
COPY web /app/web
COPY src /app/src

# Create folder writable by the application (non-persistent data)
# Prepare folders for Yii 2.0 Framework (www-data)
RUN mkdir -p /app/runtime /app/web/assets && \
    chown -R 1000:33 /app/runtime /app/web/assets

RUN chmod -R u+x /app/src/bin
ENV PATH /app/src/bin:${PATH}
