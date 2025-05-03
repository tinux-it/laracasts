FROM php:8.4.2-fpm-alpine3.21

WORKDIR /var/www

ARG UID=1000
ARG GID=1000

# Create a non-root user
RUN addgroup -g $GID laravel-user && \
    adduser -D -u $UID -G laravel-user laravel-user

# Install system packages and PHP extensions in one step
RUN apk add --no-cache \
    bash \
    git \
    curl \
    zip \
    unzip \
    libpng \
    libjpeg-turbo \
    libwebp \
    freetype \
    oniguruma \
    libxml2 \
    libzip \
    icu \
    postgresql-libs \
    $PHPIZE_DEPS \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    libzip-dev \
    icu-dev \
    postgresql-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install -j$(nproc) pdo pdo_sqlite mbstring zip exif pcntl bcmath gd intl && \
    apk del -f .build-deps

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Ensure needed directories exist and have correct permissions
RUN mkdir -p storage/framework/views storage/framework/sessions storage/framework/cache bootstrap/cache && \
    chown -R laravel-user:laravel-user /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Use the non-root user
USER laravel-user

# Add entrypoint and make it executable
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 9000
CMD ["php-fpm"]
