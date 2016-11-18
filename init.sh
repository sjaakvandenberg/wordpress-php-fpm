#!/bin/sh

chown -R www-data:www-data /var/www

uname -a
php --version

php-fpm7 -F
