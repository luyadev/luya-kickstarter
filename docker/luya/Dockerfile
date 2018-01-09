FROM php:7.2-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv mbstring \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql
COPY ./luya.sh /usr/local/bin/luya
COPY ./setup.sh /usr/local/bin/setup
RUN chmod +x /usr/local/bin/luya
RUN chmod +x /usr/local/bin/setup