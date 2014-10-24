FROM debian:wheezy

# Modify the PHP modules below to match your project requirements
RUN apt-get update && \
    apt-get install -y \
        php5-cli \
        php5-imagick \
        php5-intl \
        php5-mcrypt \
        php5-mysql \
        php-apc && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin && \
    ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

COPY ./ /app/

RUN /app/init --env="Dotenv"

# /!\ development setting
RUN ln -s /app/backend/web /app/frontend/web/backend
