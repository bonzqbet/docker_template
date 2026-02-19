FROM php:8.3.6-apache

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
    libpq-dev

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install -j $(nproc) gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure php.ini
RUN echo 'opcache.file_update_protection=0\n\
opcache.memory_consumption=256\n\
opcache.max_accelerated_files=24000\n\
opcache.max_wasted_percentage=10\n\
opcache.fast_shutdown=1\n\
zlib.output_compression=On\n\
upload_max_filesize=512M\n\
max_input_vars=10000\n\
max_execution_time=30000\n\
short_open_tag=On\n\
memory_limit=512M\n\
post_max_size=512M\n' > /usr/local/etc/php/php.ini

# Cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Set permissions (if necessary)
RUN chown -R www-data:www-data /var/www/html