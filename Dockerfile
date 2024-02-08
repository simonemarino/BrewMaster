FROM php:8.3-fpm

# Copy composer.lock and composer.json
COPY composer.json /var/www/

# Set working directory
WORKDIR /var/www


RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -

RUN apt-get install -y nodejs

# Install dependencies
RUN apt-get update && apt-get install -y \
    sudo \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    psmisc \
    iproute2


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql zip exif
#RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
#RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www-user

# Copy existing application directory contents
COPY --chown=1000:1000 . /var/www
#COPY . /var/www

# Copy existing application directory permissions
#RUN chown -R 1000:1000 . /var/www

# Change current user to www
USER www-user

#RUN composer install
#RUN php artisan key:generate
#RUN php artisan storage:link
#RUN php artisan system:start # Non funziona durante la fase di build, ha bisogno del db

COPY --chmod=755 start.sh /start.sh
ENTRYPOINT ["/start.sh"]
