docker exec ascio-framework-php /usr/local/bin/php $1 -replace '.*ascio-framework\\\\(.*)', '/code/$1' -replace '\\','/'


