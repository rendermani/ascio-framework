#!/bin/bash

root="`dirname "$0"`/../"
cd $root
FILE=.env
if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $file"
    cp .env.dist .env
fi
chmod u+x $root/bin/* 
FILE=config/accounts
if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $file"
    cp -R config/accounts.dist config/accounts 
fi
# set the .env files default passwords. don't overwrite existing passwords. only replace xxxxx
sed 's/xxxxx/'$(openssl rand -base64 29 | tr -d "=+/" | cut -c1-25)'/g' .env
# start all docker containers
docker-compose -f docker/docker-compose.yml up -d --remove-orphans 
# install all php dependancies
docker exec ascio-framework-php composer install
# create new tables
docker exec ascio-framework-php php database/migration/create-tables.php
# set lavarel APP_KEY
docker exec ascio-framework-php php artisan key:generate