FROM php:7.3-fpm-alpine

COPY ./conf/php-fpm.conf /usr/local/etc/php/php-fpm.conf
COPY ./conf/php.ini /usr/local/etc/php/php.ini

# 修改了 alpine 系统的软件源
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/g' /etc/apk/repositories \ 
    && docker-php-ext-install pdo_mysql \
    # 安装了一个phpize_deps，用后删除即可，保持镜像瘦小
    && apk add ${PHPIZE_DEPS} \
    && pecl install redis-4.0.1 \
    && docker-php-ext-enable redis \
    && apk del ${PHPIZE_DEPS}

