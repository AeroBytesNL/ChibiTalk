FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libxml2-dev \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    nodejs \
    npm \
    gnupg \
    ca-certificates \
    && apt-get clean

RUN docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql intl xml zip bcmath opcache

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --prefer-dist

RUN npm install && npm run build

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

CMD ["php-fpm"]
