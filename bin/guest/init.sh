#!/bin/bash

root="`dirname "$0"`/../.. "
cd $root
FILE=$root/.env
AscioPW=$(openssl rand -base64 29 | tr -d "=+/" | cut -c1-25)

if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $FILE"
    sed 's/xxxxx/'$AscioPW'/g' $root/.env.dist > $root/.env
fi
chmod u+x $root/bin/* 
FILE=$root/config/accounts
if [ -f "$FILE/default.json" ]; then
    echo "$FILE exists"
else 
    echo "Creating $FILE"
    cp -R $root/config/accounts.dist $root/config/accounts
    sed 's/xxxxx/'$AscioPW'/g' $root/config/accounts.dist/default.json > $root/config/accounts/default.json 
fi
FILE=$root/bin/up-custom.sh
if [ -f "$FILE" ]; then
    echo "$FILE exists"
else 
    echo "Creating $FILE"
    cp $root/bin/up.sh $FILE
fi


