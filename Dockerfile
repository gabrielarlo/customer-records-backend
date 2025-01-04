# Dockerfile
FROM php:8.4-rc-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pgsql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user
RUN addgroup --system --gid 1000 www
RUN adduser --system --uid 1000 --ingroup www www

# Create necessary directories and set permissions
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache \
    && chown -R www:www /var/www \
    && chmod -R 775 /var/www

# Copy existing application directory contents
COPY --chown=www:www . /var/www

# Set proper permissions for Laravel
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Change current user to www
USER www

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]