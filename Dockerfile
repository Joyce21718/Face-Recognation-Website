FROM php:8.3-apache

WORKDIR /var/www/html

COPY . .

# 🔥 IMPORTANT: change Apache root to /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|/var/www/|/var/www/html/public|g' /etc/apache2/apache2.conf

RUN apt-get update && apt-get install -y unzip git libzip-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]