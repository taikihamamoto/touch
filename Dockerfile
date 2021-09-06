FROM php:7.2-apache
COPY ./config/php/php.ini /usr/local/etc/php/
COPY ./config/apache/*.conf /etc/apache2/sites-enabled/

RUN apt-get update \
  && apt-get install -y sudo zlib1g-dev libpq-dev mariadb-client unzip\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html

# RUN composer global require "laravel/installer"