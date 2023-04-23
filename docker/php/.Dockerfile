FROM php:8.1-fpm

LABEL version="1.0"
LABEL author="Andrei Skripnikov"
LABEL email="skreiphoff@gmail.com"

RUN apt-get update
RUN apt-get -y install git
#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

RUN apt-get update && apt-get upgrade -y

# xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug
ENV PHP_IDE_CONFIG 'serverName=localhost'
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request = no" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "extension=pdo_mysql.dll" >> /usr/local/etc/php/conf.d/docker-fpm.ini
COPY / /usr/local/etc/php-fpm.d/
CMD ["php-fpm"]

RUN chmod -R 777 /app/storage/

