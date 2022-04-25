#!/bin/bash
DockerComposeFile="`dirname "$0"`/../docker-compose.yml"
docker-compose -f $DockerComposeFile restart order-queue web php poll-default sync mysql-connector 
