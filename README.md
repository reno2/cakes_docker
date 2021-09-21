# Дистрибутив сайта

Сконфигурирован на docker-compose  
Состоит из 6 контейнеров:  
nginx - отвечает за переадресацию запросов в контейнеры  
adminer - доступ к базе
fpm - файлы сайта и Php
mysql - база
redis - для связи с laravel-echo-server
node - для запуска Npm и laravel-echo0server

## Установка:

1. После запуска Node копируем и выпоняем скрипт node_start. Который устанавливает глобально laravel-echo-server и выполняет его старт
2. Echo сервер настраивается в laravel-echo-server.json, authHost если прописать
   "authHost": "http://nginx:6001/" - запросы не падают, но связь не работает
   "authHost": "http://node/" - запросы не падают, но связь не работает
   "authHost": "http://nginx/" - запросы не падают, но связь не работает

###

{ Error: connect ECONNREFUSED 172.23.0.7:80
at TCPConnectWrap.afterConnect [as oncomplete] (net.js:1107:14)
errno: 'ECONNREFUSED',
code: 'ECONNREFUSED',
syscall: 'connect',
address: '172.23.0.7',
port: 80 }
Error sending authentication request.

3. В итоге задача перенести запуск laravel-echo-server в supervision контейнера fpm

## Полезные команды docker:

Запуск docker-compose:  
docker-compose up

Создание контейнеров:  
docker-compose build

Остановка docker-compose:  
docker-compose stop

Уничтожение контейнеров:  
docker-compose down

Выполнение команды в контейнере:  
docker exec #имя_контейнера# #команда#

Подключение к бэку с помощью терминала:  
docker exec -it node bash

Копирование файла в контейнер:
docker cp host_source_path container:destination_path
