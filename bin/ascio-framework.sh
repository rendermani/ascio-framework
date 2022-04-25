#!/bin/bash
DockerComposeFile="`dirname "$0"`/../docker-compose.yml"
case $1 in 
    up)
    echo "up"
    docker-compose -f $DockerComposeFile up -d --remove-orphans zookeeper kafka mysql mysql-connector phpmyadmin sync web php order-queue poll-default     
    ;;
    down)
    echo "down"
    docker-compose -f $DockerComposeFile down
    ;;
    restart)
    echo "restart"
    docker-compose -f $DockerComposeFile restart order-queue web php poll-default sync mysql-connector 
    ;;
    php)
    echo "php" 
    docker-compose -f $DockerComposeFile exec php php  $2 $3 $4 $4
    ;;
    logs)
    echo "logs"
    docker-compose -f $DockerComposeFile logs -f
    ;;
    shell)
    docker-compose -f $DockerComposeFile exec php bash
    echo "shell" 
    ;;
    update)
    docker-compose -f $DockerComposeFile exec php composer update $2 $3
    echo "update"
    ;;
    generate)
    docker-compose -f $root/docker-compose.yml php php bin/update-classes.php  $2 $3 $4
    echo "generate"
    ;;
    sync)
    echo "sync"
    docker-compose -f $root/docker-compose.yml php php services/sync-orders.php  $2 $3 $4
    ;;
esac