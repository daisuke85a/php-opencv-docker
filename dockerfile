FROM morozovsk/php-opencv

RUN apt update
RUN apt install -y php-dev pkg-config imagemagick libmagickwand-dev php-pear php-mbstring
RUN pecl install imagick

RUN echo [imagick] >> /etc/php/7.2/cli/php.ini 
RUN echo extension=imagick.so >> /etc/php/7.2/cli/php.ini 

RUN apt install -y vim

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'baf1608c33254d00611ac1705c1d9958c817a1a33bce370c0595974b342601bd80b92a3f46067da89e3b06bff421f182') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer