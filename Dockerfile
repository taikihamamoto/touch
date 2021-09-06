FROM php:7.3-apache
COPY ./config/php/php.ini /usr/local/etc/php/
COPY ./config/apache/*.conf /etc/apache2/sites-enabled/

RUN apt-get update \
  && apt-get install -y sudo \
  gcc \
  make \
  git \
  zip \
  unzip \
  vim \
  libpng-dev \
  libmcrypt-dev \
  libjpeg-dev \
  libfreetype6-dev \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install -j$(nproc) gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

WORKDIR /var/www/app/laravel

# RUN composer global require "laravel/installer"