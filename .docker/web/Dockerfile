FROM centos:6.9

ADD php.ini /etc/php.ini

ENV PHP_VERSION 5.3.3

# yumリポジトリの参照先をcentos:6.9のアーカイブに書き換える
RUN sed -i "s|#baseurl=|baseurl=|g" /etc/yum.repos.d/CentOS-Base.repo \
  && sed -i "s|mirrorlist=|#mirrorlist=|g" /etc/yum.repos.d/CentOS-Base.repo \
  && sed -i "s|http://mirror\.centos\.org/centos/\$releasever|http://vault\.centos\.org/centos/6.9|g" /etc/yum.repos.d/CentOS-Base.repo

RUN yum install -y \
        php \
        php-mbstring \
        php-pgsql \
        php-mysql \
        php-gd \
        zip \
        unzip \
        git \
        httpd \
        php-devel \
        httpd-devel \
        php-pear \
        gcc && \
    yum clean all

# Xdebug install
RUN pecl install xdebug-2.2.7
RUN echo -e "\nzend_extension=\"/usr/lib64/php/modules/xdebug.so\"" >> /etc/php.ini

EXPOSE 80

CMD ["/usr/sbin/apachectl","-DFOREGROUND"]
