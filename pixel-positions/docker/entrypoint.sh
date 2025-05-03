#!/bin/sh

# Run migrations
php artisan refresh --seed

# Start PHP-FPM
exec php-fpm
