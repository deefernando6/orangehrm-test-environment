FROM orangehrm/prod-environment:rhel8-php-8.2-latest

LABEL maintainer = "orangehrm"
LABEL authors = "OrangeHRM TechOps <techops@orangehrm.com>"

ARG REDHAT_USERNAME
ARG REDHAT_PASSWORD

# Register a system with the Red Hat Customer Portal
RUN subscription-manager register --username $REDHAT_USERNAME --password $REDHAT_PASSWORD && \
subscription-manager refresh && \
subscription-manager attach --auto

# remove mariadb repo
RUN rm -rf /etc/yum.repos.d/mariadb.repo
# install dependent software
RUN dnf install -y gcc-c++ make
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash

# RUN touch /etc/yum.repos.d/wandisco-svn.repo
# RUN echo $'[WandiscoSVN] \nname=Wandisco SVN Repo \nbaseurl=http://opensource.wandisco.com/centos/7/svn-1.9/RPMS/$basearch/ \nenabled=1 \ngpgcheck=0 ' > /etc/yum.repos.d/wandisco-svn.repo
#installing nodejs
RUN source ~/.bashrc
RUN export NVM_DIR="$HOME/.nvm" \
    && [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" \
    && [ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion" \   
    && source ~/.bashrc \
    && nvm install 6 \
    && nvm alias default 6 \
    && nvm install 14.17.5 \
    && nvm alias latest 14.17.5 \
    && nvm install 18.18.0 \
    && nvm alias hydrogen 18.18.0 \
    && nvm ls \
    && nvm use default \ 
    && npm install bower -g \ 
    && npm install -g gulp@4.0.2 \
    && npm install nodemon -g \
    && npm install pm2 -g

RUN dnf -y install \
    bzip2 \
    git \
    nmap \
    sendmail \
    subversion \
    # mod_dav_svn \
    vim \
    && dnf -y update bash \
    && rm -rf /var/cache/dnf/* \
    && dnf clean all 
# Our user in the container
USER root
# set working dir as the installer directory
WORKDIR /var/www/html/installer/

# set git system config to use https instead of git
RUN git config --system url."https://".insteadOf git://

# install php-ast module
RUN pecl install ast
RUN echo "extension=ast.so" >> /etc/php.ini

##install php-stats module
#RUN pecl install stats-2.0.3
#RUN echo "extension=stats.so" >> /etc/php.ini

# temporary switch on the "allow_url_fopen" to install composer and phan
RUN sed -i 's:^allow_url_fopen = Off$:allow_url_fopen = On:g' /etc/php.ini

# installing the  composer 1.x 
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=1.10.27

# installing the  composer 2.x 
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

#add vhost config
COPY config/apache2-sites/orangehrm.conf /etc/httpd/sites-available/orangehrm.conf
COPY config/apache2-sites/000-default.conf /etc/httpd/sites-available/000-default.conf
COPY config/cert/orangehrm.crt /etc/apache2/cert/orangehrm.crt
COPY config/cert/orangehrm.key /etc/apache2/cert/orangehrm.key
RUN rm /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/orangehrm.conf /etc/httpd/sites-enabled/orangehrm.conf
RUN ln -s /etc/httpd/sites-available/000-default.conf /etc/httpd/sites-enabled/000-default.conf

# Install wkhtmltopdf
RUN dnf install -y https://repo.almalinux.org/almalinux/8/AppStream/x86_64/os/Packages/xorg-x11-fonts-75dpi-7.5-19.el8.noarch.rpm
RUN wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox-0.12.6-1.centos8.x86_64.rpm
RUN dnf localinstall -y wkhtmltox-0.12.6-1.centos8.x86_64.rpm

# copy configuration files
COPY config/mysql-client/my.cnf /etc/mysql/my.cnf
COPY config/mysql-client/conf.d /etc/mysql/conf.d
COPY config/db-check.sh /var/www/db-check.sh
#COPY phpunit-5.7.21.phar /usr/bin/phpunit
#COPY phpunit-3.7.28.phar /usr/bin/phpunit3
#COPY phpunit-7.5.14.phar /usr/bin/phpunit7
#COPY phpunit-8.2.5.phar /usr/bin/phpunit8
COPY phpunit-8.5.41.phar /usr/bin/phpunit8
COPY phpunit-9.6.22.phar /usr/bin/phpunit9
COPY phpunit-10.5.39.phar /usr/bin/phpunit10
COPY phpunit-11.5.1.phar /usr/bin/phpunit11

COPY config/nvm /opt/nvm

RUN  chmod 544 /opt/nvm

RUN  chmod +x /usr/bin/phpunit8
RUN  chmod +x /usr/bin/phpunit9
RUN  chmod +x /usr/bin/phpunit10
RUN  chmod +x /usr/bin/phpunit11
#CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

# installing phan
RUN cd /var/lib && /usr/local/bin/composer require --dev phan/phan
RUN ln -s /var/lib/vendor/bin/phan /usr/bin/phan

# enable and configure xdebug
RUN pecl install xdebug-3.4.0

# temporary switch on the "allow_url_fopen" to install composer and phan
RUN sed -i 's:^allow_url_fopen = On$:allow_url_fopen = Off:g' /etc/php.ini

#installing nc command
RUN dnf install -y nmap-ncat

# Unregister subscription
RUN subscription-manager unregister