FROM php:7.4.4-fpm-alpine3.11
WORKDIR "/web"

RUN apk add --no-cache curl libxml2-dev \
    && docker-php-ext-install mysqli pdo_mysql
