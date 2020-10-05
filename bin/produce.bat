@echo off
for %%I in (.) do set CurrDirName=%~p0
set DockerComposeFile=%CurrDirName%..\docker\docker-compose.yml
set topic=ascio.api.framework.%1

docker-compose -f %DockerComposeFile%  exec  kafka kafka-console-producer.sh --bootstrap-server localhost:9092 --topic %topic%


