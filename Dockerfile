# Use official PHP image with required extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies INCLUDING dev dependencies to have Faker available during seed
RUN composer install --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expose the port Render will bind to (Render injects the PORT env var)
EXPOSE 8080

# Wait for PostgreSQL, migrate, seed, cache config, then run php-fpm (not artisan serve!)
CMD bash -c " \
  until php artisan migrate --force; do \
    echo 'Waiting for PostgreSQL...'; \
    sleep 3; \
  done && \
  php artisan db:seed --force && \
  php artisan config:cache && \
  php-fpm"
