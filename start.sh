#!/bin/bash
set -e

# Railway injects PORT, default to 8080
PORT=${PORT:-8080}

# Configure Apache port before starting
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Cache config and views
php artisan config:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# --- WORKAROUND DARI THREAD RAILWAY ---
# Hapus MPM lain dan paksa prefork tepat sebelum Apache start
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.*
a2enmod mpm_prefork 2>/dev/null || true
# --------------------------------------

# Start Apache
exec apache2-foreground