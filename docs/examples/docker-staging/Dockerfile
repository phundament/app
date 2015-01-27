# Phundament 4 - staging setup wit BASIC_AUTH
#
# /!\ IMPORTANT NOTICE /!\
# In order to use this Dockerfile you have to copy it your project root and replace your current Dockerfile
#
# TODO: Update after upgrade to Docker 1.5.0, see https://github.com/docker/docker/pull/9707

FROM myapp:production

RUN /usr/local/bin/composer install --prefer-dist --dev

ADD build/staging/default     /etc/nginx/sites-available/default
ADD build/staging/.htpasswd   /etc/nginx/.htpasswd

ENV YII_ENV dev
ENV YII_DEBUG true