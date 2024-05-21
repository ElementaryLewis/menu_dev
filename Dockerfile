FROM php:8.3-apache

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install pdo_mysql \
    && pecl install xdebug-3.3.1 \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite