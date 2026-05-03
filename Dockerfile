FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    docker-php-ext-install pdo pdo_mysql 

COPY .  /home

CMD ["php", "ghost"]