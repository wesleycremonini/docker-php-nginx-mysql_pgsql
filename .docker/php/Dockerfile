FROM php:8.1.7-fpm

RUN apt update -y && apt install -y git zip unzip curl libpq-dev
# libpq-dev só para pgsql

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql mbstring
# pdo_mysql