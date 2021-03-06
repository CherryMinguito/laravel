FROM php:7.3.26-fpm

RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    default-mysql-client \
    sudo \
    libzip-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd zip && \
    # zip, unzip
    apt-get install -y zip unzip && \
    # vim
    apt-get install -y vim && \
    # rsync
    apt-get install -y rsync ssh && \
    # composer
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --version=1.10.17 && \
    mv composer.phar /usr/local/bin/composer && \
    # install grpc
    pecl install grpc && \
    docker-php-ext-enable grpc