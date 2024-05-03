FROM php:8.2.4-fpm

WORKDIR /app

ARG DB_NAME
ARG DB_CONNECTION
ARG APP_ENV

ENV ACCEPT_EULA=Y
ENV DB_DATABASE=${DB_NAME}
ENV APP_ENV=production

RUN apt-get update && \
    apt-get install -y software-properties-common && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y \
    autoconf automake libtool m4 \
    libbz2-dev \
    libzip-dev \
    git \
    nano \
    grep \
    libtool \
    make \
    autoconf \
    g++ \
    bash \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev &&\
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql &&\
    docker-php-ext-configure pcntl --enable-pcntl &&\
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/

RUN apt-get -y update && \
    docker-php-ext-install gd pdo pdo_pgsql pgsql gd zip pcntl

RUN echo "upload_max_filesize = 2G" >> /usr/local/etc/php/php.ini && \
    echo "post_max_size = 2G" >> /usr/local/etc/php/php.ini

RUN echo 'max_execution_time = 600' >> /usr/local/etc/php/conf.d/docker-php-maxexectime.ini;

RUN pecl config-set php_ini /etc/php/8.2/fpm/php.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.7.5

RUN apt-get update
RUN apt-get install -y ca-certificates curl gnupg
RUN mkdir -p /etc/apt/keyrings
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
RUN NODE_MAJOR=20
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_18.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
RUN apt-get update
RUN apt-get install nodejs -y
RUN npm install -g npm@latest

COPY . .

CMD [ "bash", "entrypoint.sh" ]

