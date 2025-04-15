#!/bin/bash
composer install
php artisan migrate --seed --force
php artisan optimize:clear
php artisan optimize
ln -s /app/storage/app/public  /app/public/storage 
chown -R www-data:www-data /app/storage /app/bootstrap/cache  
chmod -R 775 /app/storage /app/bootstrap/cache
chmod -R 777 /app/storage/logs
