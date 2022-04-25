#!/bin/bash

root="`dirname "$0"`/../"
topic=ascio.api.framework.$1 
echo "topic $topic"
docker-compose -f $root/docker-compose.yml exec kafka kafka-console-consumer.sh --bootstrap-server localhost:9092 --topic %topic% $topic





