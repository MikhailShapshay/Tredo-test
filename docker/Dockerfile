FROM php:8.3-fpm

# Установка системных зависимостей
RUN apt-get update && apt-get install -y --no-install-recommends \
    zlib1g-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libpq-dev \
    unzip \
    ca-certificates \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip gd opcache intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Копируем composer из официального образа
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем все файлы проекта внутрь контейнера
COPY . .

# Устанавливаем права на storage и bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Установка зависимостей без запуска скриптов (чтобы избежать ошибки с artisan)
RUN composer install --no-scripts --no-interaction --prefer-dist --no-dev

# Запуск artisan-скриптов после установки зависимостей
RUN php artisan package:discover --ansi && \
    php artisan vendor:publish --tag=filament-config --force && \
    php artisan vendor:publish --tag=filament-assets --force
