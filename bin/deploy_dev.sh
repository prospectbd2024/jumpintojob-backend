#!/bin/bash
files='-f docker-compose.yml'
if [[ ! -e .env ]]
then
    cp .env.example-dev .env
fi
docker compose $files down
docker compose $files up -d --build
docker compose exec backend sh ./bin/update_dev.sh
sleep 60
docker compose  exec -d queue  php artisan queue:work --sleep=3 --tries=3 --timeout=120
echo 'http://localhost:8090/'
