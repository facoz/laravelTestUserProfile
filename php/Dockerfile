FROM php:8.1-fpm

WORKDIR /var/www/html

# Instala las extensiones necesarias de PHP

RUN docker-php-ext-install pdo pdo_mysql

# RUN php artisan migrate

CMD ["php-fpm"]
