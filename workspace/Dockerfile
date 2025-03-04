FROM php:8.2-cli
RUN apt-get update && apt-get install -y zip unzip git curl
WORKDIR /var/www/html
COPY . /var/www/html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
CMD ["bash"]
