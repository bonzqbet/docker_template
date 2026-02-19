FROM php:7.4.0-apache

# ใช้แหล่งแพ็กเกจของ Debian buster ที่ถูกย้ายไป archive
RUN set -eux; \
  sed -i -e 's|deb.debian.org/debian|archive.debian.org/debian|g' /etc/apt/sources.list; \
  sed -i -e 's|security.debian.org/debian-security|archive.debian.org/debian-security|g' /etc/apt/sources.list; \
  printf 'Acquire::Check-Valid-Until "false";\n' > /etc/apt/apt.conf.d/99no-check-valid-until

# ติดตั้งแพ็กเกจ (ไม่ต้องติดตั้ง apache2 ซ้ำ เพราะ base image มี Apache แล้ว)
RUN apt-get update && apt-get install -y --no-install-recommends \
    iputils-ping \
    libcurl3-dev \
    sudo \
    nano \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libwebp-dev \
    libpq-dev \
  && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install -j"$(nproc)" gd

# เปิด mod_rewrite
RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html