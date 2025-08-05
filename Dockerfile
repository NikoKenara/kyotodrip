# Gunakan base image PHP dengan Apache
FROM php:8.2-apache

# Install ekstensi dan dependency yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Aktifkan mod_rewrite di Apache
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy semua file ke dalam container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Ubah permission storage dan cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Set dokumen root Apache ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache config
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Buka port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
