#!/bin/bash
docker-compose -f docker/docker-compose.yml run  php composer install
docker-compose  -f docker/docker-compose.yml  run  php php database/migration/create-tables.php
docker-compose  -f docker/docker-compose.yml  down
