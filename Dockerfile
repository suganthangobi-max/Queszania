FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN echo "display_errors = Off" >> /usr/local/etc/php/php.ini && echo "error_reporting = 0" >> /usr/local/etc/php/php.ini && echo "session.use_cookies = 1" >> /usr/local/etc/php/php.ini && echo "session.cookie_samesite = None" >> /usr/local/etc/php/php.ini && echo "session.cookie_secure = 1" >> /usr/local/etc/php/php.ini
COPY . /var/www/html/
EXPOSE 80