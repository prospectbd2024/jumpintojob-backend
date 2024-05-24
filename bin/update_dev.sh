#!/bin/bash
composer install
php artisan optimize:clear
php artisan optimize
ln -s /app/storage/app/public  /app/public/storage
php artisan migrate --seed --force
