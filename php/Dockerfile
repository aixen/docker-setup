FROM php:8.2-fpm
RUN apt-get update && apt-get install -y zip unzip git curl libpng-dev libonig-dev libxml2-dev
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 9000
CMD ["php-fpm"]
