FROM phundament/app

# Install application packages on image build when used as a base-image
ADD ./composer.json /app/composer.json
ADD ./composer.lock /app/composer.lock
# Use `--no-dev`, if you're building from `:production` image
RUN /usr/local/bin/composer install --prefer-dist

ADD . /app