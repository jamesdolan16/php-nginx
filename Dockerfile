FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libicu-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql intl zip opcache

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Disable default Xdebug configuration
RUN rm /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Add our custom Xdebug configuration
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www/html
