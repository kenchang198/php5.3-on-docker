FROM php:5.3-apache

ADD php.ini /usr/local/lib/php.ini

RUN pecl install xdebug-2.2.7

RUN echo -e "\nzend_extension=\"/usr/local/lib/php/extensions/no-debug-non-zts-20090626/xdebug.so\"" >> /usr/local/lib/php.ini

RUN service apache2 restart

EXPOSE 80

CMD ["/usr/sbin/apachectl","-DFOREGROUND"]