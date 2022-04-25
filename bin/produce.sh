#!/bin/bash

root="`dirname "$0"`/../"
topic=ascio.api.framework.$1 
echo "topic $topic"
docker-compose -f $root/docker-compose.yml exec -it  kafka kafka-console-producer.sh --bootstrap-server localhost:9092 --topic $topic





