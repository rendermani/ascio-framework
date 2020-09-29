@echo off
for %%I in (.) do set CurrDirName=%~p0
set DockerComposeFile=%CurrDirName%..\docker\docker-compose.yml
docker-compose -f %DockerComposeFile% up -d --remove-orphans zookeeper kafka mysql mysql-connector phpmyadmin sync web php order-queue poll-default

REM zookeeper: kafka queue manager. if this is removed, configure new kafka-connection in .env 
REM kafka: kafka queue. if this is removed, configure new kafka-connection in .env 

REM mysql: mysl database server. if this is removed, configure new mysql-connection config/accouts/* 
REM mysql-connector: syncs to a database. can be removed.
REM phpmyadmin: can be removed

REM poll-default: can be removed and started on another machine
REM sync: can be removed and started on another machine
REM order-queue: can be removed and started on another machine

REM web: the webserver nginx. rest-api and lavarel application. can be removed
REM php: php used by nginx, and some commandline scripts like init.sh