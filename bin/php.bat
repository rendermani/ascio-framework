@echo off
for %%I in (.) do set CurrDirName=%~p0
set DockerComposeFile=%CurrDirName%..\docker\docker-compose.yml
docker-compose -f %DockerComposeFile% exec php php %1 %2 %3 %4 %4


