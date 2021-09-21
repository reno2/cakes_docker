FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        jpegoptim \
        optipng  \
        libpng-dev \
        libonig-dev \
        libzip-dev \
        libmcrypt-dev \
        cron \
        supervisor \
        && pecl install mcrypt \
        && docker-php-ext-enable mcrypt \
        && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip exif \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Добавим свой php.ini, можем в нем определять свои значения конфига
ADD docker/php.ini /usr/local/etc/php/conf.d/40-custom.in

COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
#COPY docker/tools/start.sh  /start.sh

COPY docker/init-scripts/shell.sh /shell.sh

RUN chmod 777 /shell.sh




# Указываем рабочую директорию для PHP
WORKDIR /var/www/lara-docker.ru

EXPOSE 9000
ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/conf.d/supervisord.conf"]
#ENTRYPOINT ["sh", "/var/www/lara-docker.ru/start.sh"]
#CMD ["php-fpm"]