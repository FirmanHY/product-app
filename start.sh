#!/bin/bash
set -e

# Railway injects PORT, default to 8080
PORT=${PORT:-8080}

# Configure Apache port before starting
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Generate app key if not set
php artisan key:generate --force

# Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Start Apache
apache2-foreground
