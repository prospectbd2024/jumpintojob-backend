#!/bin/bash
if [[ ! -e .env ]]
then
    cp .env.windows-dev .env
fi
#composer update
php artisan optimize:clear
php artisan migrate --seed --force
ln -s /app/storage/app/public  /app/public/storage
php artisan optimize
