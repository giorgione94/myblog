#!/bin/bash

apt -qy update

apt -qy install curl git zip unzip

docker-php-ext-install pdo_mysql ctype bcmath zip

curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/user/local/bin --filename=composer

apt -qy install npm