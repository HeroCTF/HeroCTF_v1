FROM php:7.2-apache

RUN mkdir /dossiersupersecret/
ADD flag.txt /dossiersupersecret/
RUN chmod 755 /dossiersupersecret
RUN chmod 744 /dossiersupersecret/flag.txt

COPY src/ /var/www/html/

RUN chmod 777 /var/www/html/tmp/

