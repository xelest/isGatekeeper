FROM php:7.4-apache

RUN docker-php-ext-install mysqli

COPY ["CCIS GateKeeper/dist/", "/var/www/html/"]
COPY gatekeeperdevice/ /var/www/html/gatekeeperdevice/

RUN chown www-data:www-data \
      /var/www/html/UIDContainer.php \
      /var/www/html/UIDContainers.php \
      /var/www/html/gatekeeperdevice/UIDContainer.php \
      /var/www/html/gatekeeperdevice/UIDContainers.php \
      /var/www/html/gatekeeperdevice/UIDContainer_out.php

EXPOSE 80
