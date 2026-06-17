FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip supervisor \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev \
    debian-keyring debian-archive-keyring apt-transport-https \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring gd zip pcntl sockets bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Caddy
RUN curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/gpg.key' | gpg --dearmor -o /usr/share/keyrings/caddy-stable-archive-keyring.gpg \
    && curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/debian.deb.txt' | tee /etc/apt/sources.list.d/caddy-stable.list \
    && apt-get update && apt-get install -y caddy \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js 20 for Vite build
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files and install PHP dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copy package files and install + build frontend
COPY package.json package-lock.json ./
RUN npm ci && npm cache clean --force

# Copy the rest of the application
COPY . .

# Run post-install scripts and build frontend
RUN composer dump-autoload --optimize \
    && php artisan package:discover --ansi \
    && npm run build \
    && rm -rf node_modules

# Copy configs
COPY docker/Caddyfile /etc/caddy/Caddyfile
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Ensure storage & cache directories are writable
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Optimize Laravel for production
RUN php artisan config:clear \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE ${PORT:-8080}

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
