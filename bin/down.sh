#!/bin/bash
root="`dirname "$0"`/../"
cd $root
docker-compose -f docker/docker-compose.yml down