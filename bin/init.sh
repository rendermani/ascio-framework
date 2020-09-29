#!/bin/bash

root="`dirname "$0"`/../"
cd $root
FILE=.env
AscioPW=$(openssl rand -base64 29 | tr -d "=+/" | cut -c1-25)

if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $FILE"
    sed 's/xxxxx/'$AscioPW'/g' .env.dist > .env
fi
chmod u+x $root/bin/* 
FILE=config/accounts
if [ -f "$FILE/default.json" ]; then
    echo "$FILE exists"
else 
    echo "Creating $FILE"
    cp -R config/accounts.dist config/accounts
    sed 's/xxxxx/'$AscioPW'/g' config/accounts.dist/default.json > config/accounts/default.json 
fi
FILE=bin/up-custom.sh
if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $FILE"
    cp bin/up.sh bin/up-custom.sh
fi
# start all docker containers
bin/up.sh
# install all php dependancies
if [[ -n $1 ]]; then
    docker exec ascio-framework-php composer config -g github-oauth.github.com $1
fi
docker exec ascio-framework-php composer install
# create new tables
docker exec ascio-framework-php php php artisan migrate
# set lavarel APP_KEY
docker exec ascio-framework-php php artisan key:generate
# init npm
docker exec npm install && npm run dev

bin/down.sh
echo "Please edit $(pwd)/config/accounts/default.json and add your Ascio credentials. " 
echo "When done run bin/up.sh."