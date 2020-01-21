#!/bin/bash
root="`dirname "$0"`/../"
cd $root
bin/up.sh
git pull
docker exec ascio-framework-php composer update
bin/restart.sh
