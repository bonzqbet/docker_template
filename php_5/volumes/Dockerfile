FROM php:5.4-apache

# Install necessary extensions and libraries
RUN apt-get update && apt-get install -y \
    apache2 \
    iputils-ping \
    libcurl3-dev \
    sudo \
    nano \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    zlib1g-dev \
    libwebp-dev \
    libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
