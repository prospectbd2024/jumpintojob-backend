#!/bin/bash

composer install
php artisan optimize:clear
php artisan optimize
php artisan migrate:fresh --seed --force
