#!/bin/bash

root="`dirname "$0"`/../"
cd $root
FILE=.env
if [ -f "$FILE" ]; then
    echo "$FILE exist"
else 
    echo "$FILE does not exist. Creating $file"
    cp .env.dist .env
fi

FILE=config/accounts
if [ -f "$FILE" ]; then
    echo "$FILE exist"
else 
    echo "$FILE does not exist. Creating $file"
    cp -R config/accounts.dist config/accounts 
fi
docker-compose -f docker/docker-compose.yml up -d --remove-orphans 
docker exec ascio-framework-php composer global update
docker exec ascio-framework-php composer install
docker exec ascio-framework-php php database/migration/create-tables.php
#docker exec ascio-framework-php php  -r "file_exists('.env') || copy('.env.dist', '.env');file_exists('config/accounts') || rename('config/accounts.dist', 'config/accounts');"
docker exec ascio-framework-php php artisan key:generate