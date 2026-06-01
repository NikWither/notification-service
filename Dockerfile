# digest фиксирует базу — без сюрпризов при каждом pull
FROM php:8.4-fpm@sha256:121ed120cc0c125e33cd3ad9ccd7cde679e680040b21b58f8b787c28d81d9bce

# deb.debian.org из Docker в РФ часто недоступен; зеркало задаётся один раз
ARG DEBIAN_MIRROR=http://mirror.yandex.ru
RUN sed -i \
    -e "s|http://deb.debian.org/debian-security|${DEBIAN_MIRROR}/debian-security|g" \
    -e "s|http://deb.debian.org/debian|${DEBIAN_MIRROR}/debian|g" \
    /etc/apt/sources.list.d/debian.sources

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    netcat-openbsd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

COPY . .

RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 storage bootstrap/cache 2>/dev/null || true

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
