FROM php:7.4-apache

RUN docker-php-ext-install mysqli

# The app's PHP code connects with host "localhost", which mysqli resolves
# via a local Unix socket file rather than TCP. This image's PHP is compiled
# with a default socket path of /tmp/mysql.sock, but the mysql:5.7 image
# (and docker-compose.yml's shared volume) puts the real socket at
# /var/run/mysqld/mysqld.sock — point PHP at the right path.
RUN echo "mysqli.default_socket = /var/run/mysqld/mysqld.sock" > /usr/local/etc/php/conf.d/mysqli-socket.ini

# Several pages (gatekeeper.php, dashboard3.php, systemusers.php,
# tap-in-new.php, ...) use PHP-side relative paths like
# "../../gatekeeperdevice/..." and browser-side relative links the same way,
# both assuming the real production layout: "gatekeeperdevice/" sits two
# levels above "dist/" (i.e. a sibling of "CCIS GateKeeper/"). Flattening
# everything into one webroot broke that assumption for both server-side
# file writes and client-side navigation. Preserve the real nesting instead.
COPY ["CCIS GateKeeper/dist/", "/var/www/html/CCIS GateKeeper/dist/"]
COPY gatekeeperdevice/ /var/www/html/gatekeeperdevice/
COPY docker/root-index.php /var/www/html/index.php

RUN chown www-data:www-data \
      "/var/www/html/CCIS GateKeeper/dist/UIDContainer.php" \
      "/var/www/html/CCIS GateKeeper/dist/UIDContainers.php" \
      /var/www/html/gatekeeperdevice/UIDContainer.php \
      /var/www/html/gatekeeperdevice/UIDContainers.php \
      /var/www/html/gatekeeperdevice/UIDContainer_out.php

EXPOSE 80
