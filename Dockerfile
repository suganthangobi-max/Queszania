FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN mkdir -p /tmp/sessions && chmod 777 /tmp/sessions
RUN echo "display_errors = Off" >> /usr/local/etc/php/php.ini
RUN echo "error_reporting = 0" >> /usr/local/etc/php/php.ini
RUN echo "session.save_path = /tmp/sessions" >> /usr/local/etc/php/php.ini
RUN echo "session.cookie_secure = 0" >> /usr/local/etc/php/php.ini
RUN echo "session.use_strict_mode = 1" >> /usr/local/etc/php/php.ini
COPY . /var/www/html/
EXPOSE 80