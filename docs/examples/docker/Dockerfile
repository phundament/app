FROM phundament/app:development



## Install application packages on image build when used as a base-image
ADD ./composer.lock /app/composer.lock
ADD ./composer.json /app/composer.json
RUN /usr/local/bin/composer install --prefer-dist
ADD . /app