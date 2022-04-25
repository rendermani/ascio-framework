@echo off
for %%I in (.) do set CurrDirName=%~p0
set DockerComposeFile=%CurrDirName%..\docker-compose.yml
docker-compose -f %DockerComposeFile% down 