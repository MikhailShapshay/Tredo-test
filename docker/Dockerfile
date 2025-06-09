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

# Устанавливаем зависимости после копирования проекта
RUN composer install --no-interaction --prefer-dist --no-dev
