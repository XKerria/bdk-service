FROM php:fpm
COPY composer.lock composer.json /var/www/
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
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
    libonig-dev \
    libzip-dev \
    libwebp-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
#RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-png
#RUN docker-php-ext-configure gd --with-png=/usr/include/ --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-configure gd --with-webp=/usr/include/webp --with-jpeg=/usr/include --with-freetype=/usr/include/freetype2/
RUN docker-php-ext-install gd pdo_mysql mbstring zip exif pcntl
RUN pecl install -o -f redis &&  rm -rf /tmp/pear &&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www
USER www

EXPOSE 9000
CMD ["php-fpm"]
