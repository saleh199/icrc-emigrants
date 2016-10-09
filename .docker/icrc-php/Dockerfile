FROM php:7.0-fpm

MAINTAINER Saleh Saeed <saleh.saiid@gmail.com>

WORKDIR /tmp

RUN docker-php-source extract

# Install required packages
RUN apt-get -qq update && apt-get install -y apt-utils \
        git \
        wget \
        unzip \
        zlib1g-dev \
        libmcrypt-dev \
        curl \
        libmemcached-dev

# Install iconv
RUN docker-php-ext-install -j$(nproc) iconv


# Install pdop pdo_mysqli zip
RUN docker-php-ext-install pdo pdo_mysql zip bcmath mcrypt mysqli

RUN docker-php-source delete

# PHP configurations
ADD .docker/icrc-php/ini/php.ini /usr/local/etc/php/conf.d
ADD .docker/icrc-php/ini/php.pool.ini /usr/local/etc/php-fpm.d/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer

# Install xdebug
RUN pecl install -o -f xdebug-2.4.0
ADD .docker/icrc-php/ini/php-xdebug.ini /usr/local/etc/php/conf.d/php-xdebug.ini
RUN docker-php-ext-enable xdebug

WORKDIR /var/www/html

RUN usermod -u 1000 www-data

RUN apt-get autoclean && apt-get autoremove && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

CMD ["php-fpm"]
