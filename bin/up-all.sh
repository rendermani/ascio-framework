#!/bin/bash
root="`dirname "$0"`/../"
cd $root
# start with all examples
echo "Starting with all examples connectors (CouchDB, Redis)"
docker-compose -f docker/docker-compose.yml up -d --remove-orphans 