#!/bin/bash
cd docker
docker-compose run  php composer install
docker-compose run  php php database/migration/create-tables.php
docker-compose down
cd ..