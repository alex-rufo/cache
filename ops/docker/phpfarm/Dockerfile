FROM splitbrain/phpfarm:jessie

RUN apt-get update
RUN apt-get install unzip

ENV REDIS_HOST redis

RUN wget https://github.com/phpredis/phpredis/archive/master.zip -O /tmp/phpredis-master.zip
RUN mkdir /tmp/phpredis-5.6
RUN unzip -o /tmp/phpredis-master.zip -d /tmp/phpredis-5.6
WORKDIR /tmp/phpredis-5.6/phpredis-master
RUN phpize-5.6
RUN ./configure --with-php-config=php-config-5.6
RUN make
RUN make install
RUN echo 'extension=redis.so' >> /phpfarm/inst/php-5.6.19/lib/php.ini

RUN unzip -o /tmp/phpredis-master.zip -d /tmp/phpredis-5.5
WORKDIR /tmp/phpredis-5.5/phpredis-master
RUN phpize-5.5
RUN ./configure --with-php-config=php-config-5.5
RUN make
RUN make install
RUN echo 'extension=redis.so' >> /phpfarm/inst/php-5.5.33/lib/php.ini

RUN wget https://github.com/phpredis/phpredis/archive/php7.zip -O /tmp/phpredis-php7.zip
RUN unzip -o /tmp/phpredis-php7.zip -d /tmp/phpredis-7.0
WORKDIR /tmp/phpredis-7.0/phpredis-php7
RUN phpize-7.0
RUN ./configure --with-php-config=php-config-7.0
RUN make
RUN make install
RUN echo 'extension=redis.so' >> /phpfarm/inst/php-7.0/lib/php.ini

WORKDIR /app/cache
VOLUME ["/app/cache"]

RUN curl -sS https://getcomposer.org/installer | php-5.5 && mv /app/cache/composer.phar /usr/local/bin/composer