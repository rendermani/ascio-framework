@echo off
for %%I in (.) do set CurrDirName=%~p0
set DockerComposeFile=%CurrDirName%..\docker\docker-compose.yml
docker-compose -f %DockerComposeFile% logs -f php mysql-connector poll-default order-queue sync web
