FROM morozovsk/php-opencv

RUN apt update
RUN apt install -y php-dev pkg-config imagemagick libmagickwand-dev php-pear php-mbstring
RUN pecl install imagick

RUN echo [imagick] >> /etc/php/7.2/cli/php.ini 
RUN echo extension=imagick.so >> /etc/php/7.2/cli/php.ini 

RUN apt install -y vim