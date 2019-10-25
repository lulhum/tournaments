FROM php:7.3-fpm-alpine

RUN apk add --no-cache \
  git \
  curl \
  openssl \
  ssmtp \
  libzip-dev \
  postgresql-dev

RUN docker-php-ext-install -j$(nproc) \
  pcntl \
  pdo_pgsql \
  zip

RUN apk add --no-cache icu-dev
RUN docker-php-ext-install intl

RUN curl -LsS http://symfony.com/installer -o /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony

RUN curl https://raw.githubusercontent.com/composer/getcomposer.org/d3e09029468023aa4e9dcd165e9b6f43df0a9999/web/installer | php -- --quiet \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /app

ENV TZ="Europe/Paris"
ENV IS_DOCKER=1

