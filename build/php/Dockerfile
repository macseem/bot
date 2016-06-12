FROM php:5.6-fpm
MAINTAINER Maksym Dudkin <maksym.dudkin@dm-companies.com>

RUN apt-get update && apt-get install -y \
        git \
        vim \
        libicu-dev \
        libcurl4-gnutls-dev \
        libmcrypt-dev \
        zlib1g-dev \
        build-essential && \
        docker-php-ext-install \
        mbstring \
        mcrypt \
        mysql \
        mysqli \
        pdo_mysql \
        curl \
        intl \
        json \
        zip \
        bcmath

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_host=\${XDEBUG_REMOTE_HOST}" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN git clone \
    --depth=1 git://github.com/phalcon/cphalcon.git && \
    cd cphalcon/build && \
    ./install && \
    echo extension=phalcon.so > /usr/local/etc/php/conf.d/phalcon.ini

RUN apt-get update && apt-get install -y php5-mongo && \
    cp /usr/lib/php5/20131226/mongo.so /usr/local/lib/php/extensions/no-debug-non-zts-20131226 &&\
    cp /etc/php5/mods-available/mongo.ini /usr/local/etc/php/conf.d/docker-php-ext-mongo.ini

RUN apt-get update && apt-get install -y php5-memcache && \
    cp /usr/lib/php5/20131226/memcache.so /usr/local/lib/php/extensions/no-debug-non-zts-20131226 &&\
    cp /etc/php5/mods-available/memcache.ini /usr/local/etc/php/conf.d/docker-php-ext-memcache.ini

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN usermod --uid 1000 www-data && \
    chsh -s /bin/bash www-data && \
    chown www-data: /var/www

RUN echo "function composer() { /sbin/runuser www-data -c \"composer \$@\"; }" >> /root/.bashrc