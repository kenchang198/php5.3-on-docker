FROM centos:7

# Install Apache
RUN yum -y update
RUN yum -y install httpd httpd-tools

# Install EPEL Repo
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
 && rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# Install PHP 5.5
RUN yum -y install php55w php55w-bcmath php55w-cli php55w-common php55w-gd php55w-intl php55w-ldap php55w-mbstring \
    php55w-mcrypt php55w-mysql php55w-pdo php55w-pear php55w-soap php55w-xml php55w-xmlrpc php55w-devel

# Install Xdebug v2.5.0
RUN yum -y install php55w-pecl-xdebug
RUN echo -e "\nzend_extension=\"/usr/lib64/php/modules/xdebug.so\"\n" >> /etc/php.ini

COPY xdebug.ini /tmp
WORKDIR /tmp
RUN cat xdebug.ini >> /etc/php.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80

CMD ["/usr/sbin/httpd","-DFOREGROUND"]
