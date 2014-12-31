FROM phundament/app:development

## Install application packages on image build when used as a base-image
ADD ./composer.json /app/composer.json
ADD ./composer.lock /app/composer.lock
RUN /usr/local/bin/composer install --prefer-dist --no-dev
ADD . /app