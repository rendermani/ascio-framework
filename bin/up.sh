#!/bin/bash
root="`dirname "$0"`/../"
cd $root
# if you want to spread services accross machines please remove the services you don't need. 
docker-compose -f docker/docker-compose.yml up -d --remove-orphans \
zookeeper \
kafka \
mysql \
mysql-connector \
phpmyadmin \
sync \
web \
php \
order-queue \
poll-default \

#zookeeper: kafka queue manager. if this is removed, configure new kafka-connection in .env 
#kafka: kafka queue. if this is removed, configure new kafka-connection in .env 

#mysql: mysl database server. if this is removed, configure new mysql-connection config/accouts/* 
#mysql-connector: syncs to a database. can be removed.
#phpmyadmin: can be removed

#poll-default: can be removed and started on another machine
#sync: can be removed and started on another machine
#order-queue: can be removed and started on another machine

#web: the webserver nginx. rest-api and lavarel application. can be removed
#php: php used by nginx, and some commandline scripts like init.sh