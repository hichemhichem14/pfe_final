FROM php:8.0-apache
#update our system
RUN apt-get update && apt-get upgrade -y
#install mysqli because it's not there already
RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql
EXPOSE 80

COPY . /var/www/html/

#Use the default dev configuration provided by the image
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
