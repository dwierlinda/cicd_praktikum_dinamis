FROM php:8.2-fpm-alpine

# Install dependencies sistem
RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    curl \
    zip \
    unzip \
    git \
    supervisor \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    libxml2-dev

# Install ekstensi PHP
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    opcache \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project
COPY . .

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permission Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy konfigurasi Nginx dan Supervisor
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]