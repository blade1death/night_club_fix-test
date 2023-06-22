# Используем образ с PHP
FROM php:latest

# Установка необходимых зависимостей
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Копирование исходных файлов проекта в контейнер
COPY . /app

# Установка Composer для управления зависимостями PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Переход в рабочую директорию проекта
WORKDIR /app

# Установка зависимостей проекта с помощью Composer
RUN composer install --no-dev --optimize-autoloader

# Установка точки входа для запуска проекта
CMD ["php", "index.php"]