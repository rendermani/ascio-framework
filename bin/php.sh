#/!bin/bash
root="`dirname "$0"`/../"
cd $root/docker
docker-compose -f  $root/docker-compose.yml exec php php $1 $2 $3 $4 $4