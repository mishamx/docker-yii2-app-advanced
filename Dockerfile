FROM mishamx/php7:latest

ENV API_TOKEN e182383413576177cb2ae1cb4f626889a562ea07


RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install \
            mysql-client \
    && rm -r /var/lib/apt/lists/*

COPY ./composer.json /var/www/html/composer.json
COPY ./composer.lock /var/www/html/composer.lock
RUN composer install --no-progress --ignore-platform-reqs --prefer-dist --profile --optimize-autoloader \
        && chmod +x yii yii_test testinit.sh

COPY . /var/www/html

WORKDIR /var/www/html/

