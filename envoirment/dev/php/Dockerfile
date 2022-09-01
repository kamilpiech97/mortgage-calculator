FROM ghcr.io/blumilksoftware/php:8.1

ARG XDEBUG_VERSION=3.1.4
ARG INSTALL_XDEBUG=false

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    apk --no-cache add $PHPIZE_DEPS \
    && pecl install xdebug-${XDEBUG_VERSION} \
    && docker-php-ext-enable xdebug \
;fi

RUN apk update

RUN apk --no-cache add \
    mariadb-connector-c-dev \
    zip \
    git \
    libzip-dev \
    libpng-dev \
    mysql-client \
    && docker-php-ext-install \
    zip \
    gd \
    && docker-php-ext-configure \
    zip \
