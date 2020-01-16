#!/bin/bash

root="`dirname "$0"`/../"
cd $root
FILE=.env
AscioPW=$(openssl rand -base64 29 | tr -d "=+/" | cut -c1-25)

if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $file"
    sed 's/xxxxx/'$AscioPW'/g' .env.dist > .env
fi
chmod u+x $root/bin/* 
FILE=config/accounts
if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $file"
    cp -R config/accounts.dist config/accounts
    sed 's/xxxxx/'$AscioPW'/g' config/accounts.dist/default.json > config/accounts/default.json 
fi
FILE=bin/up-custom.sh
if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $file"
    cp bin/up.sh bin/up-custom.sh
fi
# start all docker containers
bin/up.sh
# install all php dependancies
docker exec ascio-framework-php composer install
# create new tables
docker exec ascio-framework-php php database/migration/create-tables.php
# set lavarel APP_KEY
docker exec ascio-framework-php php artisan key:generate