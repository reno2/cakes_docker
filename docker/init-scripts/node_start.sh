#!/bin/sh

set -e

echo 'running prestart node script'
echo 'running npm install'
npm install
npm install -g laravel-echo-server


echo 'initialization done, start watching'
npm start
npm run watch
