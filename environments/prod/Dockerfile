FROM php:7.0.8-fpm

ENV PATH $PATH:/root/.composer/vendor/bin

RUN apt-get update \
    && apt-get -y install \
            git \
            g++ \
            libicu-dev \
            libmcrypt-dev \
            zlib1g-dev \
            libxpm-dev \
            libpng-dev \
            libvpx-dev \
        --no-install-recommends \

    # Install PHP extensions
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && pecl install apcu-5.1.3 && echo extension=apcu.so > /usr/local/etc/php/conf.d/apcu.ini \

    && apt-get -y install \
#        php-memcached \
        vim \
        mysql-client \

    && apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \

    # Don't clear our valuable environment vars in PHP
    && echo "\nclear_env = no" >> /usr/local/etc/php-fpm.conf \

    # Fix write permissions with shared folders
    && usermod -u 1000 www-data

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer.phar \
    && composer.phar global require --no-progress "fxp/composer-asset-plugin:~1.2.0" \
    && composer.phar global require --no-progress "codeception/codeception=2.0.*" \
    && composer.phar global require --no-progress "codeception/specify=*" \
    && composer.phar global require --no-progress "codeception/verify=*"

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer.phar self-update --no-progress \
   && composer.phar install --prefer-dist --no-progress
