FROM php:7.4.1-fpm-alpine
WORKDIR "/web"

RUN apk add --no-cache curl libxml2-dev \
    && docker-php-ext-install mysqli pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install
