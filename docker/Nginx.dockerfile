FROM nginx:latest

ADD docker/conf/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/lara-docker.ru

EXPOSE 80