FROM php:8.2-fpm-alpine

# Set timezone and install system dependencies
RUN apk update && apk add --no-cache \
    tzdata \
    autoconf \
    g++ \
    make \
    openssl-dev \
    libpng-dev \
    libzip-dev \
    linux-headers \
    curl \
    libtool \
    pkgconfig \
    pcre-dev \
    icu-dev \
    zlib-dev \
    oniguruma-dev \
    bash \
    mariadb-dev  # Required for pdo_mysql

# Set timezone
ENV TZ="Asia/Dhaka"

# Install PHP extensions (including pdo_mysql)
RUN docker-php-ext-install gd zip bcmath sockets pdo pdo_mysql

# Install PECL extensions: mongodb and redis
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
