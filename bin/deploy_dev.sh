#!/bin/bash
files='-f docker-compose.yml'
if [[ ! -e .env ]]
then
    cp .env.example-dev .env
fi
docker compose $files down
docker compose $files up -d --build
sleep 30
docker compose exec backend sh ./bin/update_dev.sh

echo 'http://localhost:8090/'
