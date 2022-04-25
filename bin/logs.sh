#/!bin/bash
DockerComposeFile="`dirname "$0"`/../docker-compose.yml"
docker-compose -f $DockerComposeFile logs -f php mysql-connector poll-default order-queue sync web
