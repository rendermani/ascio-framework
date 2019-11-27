#!/bin/bash
DockerComposeFile="`dirname "$0"`/../docker/docker-compose.yml"
docker-compose -f $DockerComposeFile restart order-queue web poll-default sync mysql-connector 
