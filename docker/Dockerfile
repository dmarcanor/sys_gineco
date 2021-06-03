FROM php:7.3-fpm-alpine

# Install from docker-php-ext
RUN docker-php-ext-install mbstring

# Setup GD extension
RUN apk add --no-cache \
      freetype \
      libjpeg-turbo \
      libpng \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && apk del --no-cache \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && rm -rf /tmp/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# XML
RUN apk add --no-cache libxml2-dev

RUN docker-php-ext-install pdo pdo_mysql xml

# ZIP
RUN apk add --no-cache libzip-dev
RUN docker-php-ext-install zip

# ext-sockets
RUN docker-php-ext-install sockets

# ext-pcntl
RUN docker-php-ext-install pcntl

# ext-mysqli
RUN docker-php-ext-install mysqli

# ext-mcrypt
RUN apk add --no-cache libmcrypt-dev
RUN apk add --no-cache autoconf
RUN apk add --no-cache gcc make libc-dev
RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt
