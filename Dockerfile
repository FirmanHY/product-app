FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libpq-dev libzip-dev nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Fix MPM Error: Matikan mpm_event, aktifkan mpm_prefork dan rewrite
# Kita gunakan a2dismod/a2enmod agar konfigurasi Apache konsisten
RUN a2dismod mpm_event || true && \
    a2enmod mpm_prefork rewrite

# Set document root ke Laravel public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -e "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies dan build assets (Vite/Mix)
RUN npm ci && npm run build && rm -rf node_modules

# Set permissions untuk Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Port 8080 sesuai dengan default Railway/Dockerfile kamu
EXPOSE 8080

# Startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Gunakan tini atau pastikan start.sh menggunakan exec agar sinyal stop ter-handle dengan baik
CMD ["/start.sh"]