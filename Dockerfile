FROM phundament/app:development

ADD ./composer.lock /app/composer.lock
ADD ./composer.json /app/composer.json
RUN /usr/local/bin/composer install --prefer-dist --dev --optimize-autoloader
ADD . /app


# Uncomment to enable password protection (demo/demo) for app server
#ADD docs/examples/docker-staging/default     /etc/nginx/sites-available/default
#ADD docs/examples/docker-staging/.htpasswd   /etc/nginx/.htpasswd
