#!/bin/bash 
php artisan migrate --seed --force
php artisan optimize:clear
php artisan optimize 