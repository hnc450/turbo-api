FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    docker-php-ext-install pdo pdo_mysql 

COPY .  /home/turbo

CMD ["php", "ghost"]