FROM php:8.1-apache

RUN apt-get update
RUN apt-get install git zip -y
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite
COPY ./000-default.conf /etc/apache2/sites-available

COPY . /var/www/html/

WORKDIR /var/www/html/
RUN composer install
