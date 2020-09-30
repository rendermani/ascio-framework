FROM php:7.3-fpm
RUN apt-get update && apt-get -y install libpng-dev libzip-dev libxml2-dev git zip zlib1g-dev librdkafka-dev libicu-dev libxml2 libxml2-dev libxslt1.1 libxslt1-dev
RUN  docker-php-ext-configure intl\
	&& docker-php-ext-install gd pdo_mysql soap zip intl xsl

WORKDIR /code

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv  /code/composer.phar /usr/local/bin/composer
#RUN echo "host.docker.internal docker.for.mac.localhost" >> /etc/hosts
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash \
    && export NVM_DIR="$HOME/.nvm" \
    && [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"   \
    && [ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"   \
    && nvm install v12.18.3 \
    && nvm install-latest-npm \

RUN yes | pecl install xdebug rdkafka apcu\
    && docker-php-ext-enable rdkafka \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.remote_log=/var/log/xdebug" >> /usr/local/etc/php/conf.d/xdebug.ini
#ENTRYPOINT ["/bin/sh", "-c" , "echo 192.168.254.10   database-server >> /etc/hosts"]