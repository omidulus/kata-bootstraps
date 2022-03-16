FROM php:7.4-fpm-alpine3.12


RUN apk update && apk upgrade \
    && apk add --no-cache git zip openssh autoconf g++ make

ENV COMPOSER_HOME=/tmp/composer
ENV COMPOSER_MEMORY_LIMIT=-1

RUN set -uex; \
    umask 0002; \
    curl --silent --show-error https://getcomposer.org/composer-1.phar -o /usr/local/bin/composer \
    && chmod 0755 /usr/local/bin/composer \
    && composer global require hirak/prestissimo

RUN pecl -q install xdebug

COPY ./docker/docker-entrypoint.sh /docker-entrypoint.sh

# this is a hack for docker to keep folder permissions, otherwise the folder will have only root permissions
RUN mkdir var && chmod 0777 var
# use this to set default values in container, like umask
ENTRYPOINT ["/docker-entrypoint.sh"]

CMD ["php-fpm", "-F"]
