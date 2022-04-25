#!/bin/bash
root="`dirname "$0"`/../"

docker-compose -f $root/docker-compose.yml ascio-framework-php php services/sync-orders.php $1 $2 $3 $4
