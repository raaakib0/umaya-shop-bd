#!/bin/bash

# Set default if not provided
PORT=${PORT:-8080}

# Replace port in nginx config (for Render)
sed -i "s/\${PORT}/$PORT/g" /etc/nginx/conf.d/default.conf

# Run migrations and seeds
until php artisan migrate --force; do
    echo "Waiting for PostgreSQL..."
    sleep 3
done

php artisan db:seed --force
php artisan config:cache

# Start PHP-FPM and Nginx
php-fpm -D
nginx -g "daemon off;"
