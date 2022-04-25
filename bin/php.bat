
for %%I in (.) do set CurrDirName=%~p0
set DockerComposeFile=%CurrDirName%..\docker-compose.yml
set file = %1 -replace '.*ascio-framework\\\\(.*)', '/code/$1' -replace '\\','/'
echo %file%
docker exec ascio-framework-php /usr/local/bin/php %file%


