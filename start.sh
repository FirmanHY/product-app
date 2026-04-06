#!/bin/bash
set -e

# Railway injects PORT, default to 8080
PORT=${PORT:-8080}

# Fix permissions on runtime (Safety measure for Railway)
chown -R www-data:www-data storage bootstrap/cache

# Configure Apache port before starting
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Cache config and views
# Note: route:cache skipped as per your requirement
php artisan config:cache
php artisan view:cache

# Run migrations
# Migrasi otomatis saat deploy
php artisan migrate --force

# Start Apache menggunakan EXEC
# Ini menggantikan proses bash dengan apache agar PID 1
exec apache2-foreground