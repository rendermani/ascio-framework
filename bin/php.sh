#/!bin/bash
root="`dirname "$0"`/../"
cd $root/docker
docker-compose exec php php $1 $2 $3 $4 $4