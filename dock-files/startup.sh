#!/bin/bash
ENV=/var/www/html/.env
EXAMPLE=/var/www/html/.env.example
    if [ -f "$ENV" ]
    then
        echo "$ENV exists, not creating"
    else
        echo "$ENV doesn't exist, checking for example to copy ..."
        if [ -f "$EXAMPLE" ]
        then
            echo "$EXAMPLE does exist, copying to .env"
            cp /var/www/html/.env.example /var/www/html/.env
        else
            echo ".env.example not found, .env not created"
        fi
    fi

echo "running composer install"
cd /var/www/html &&
composer install

echo "creating sqlite db"
touch /var/www/html/database/database.sqlite

echo "remove echo server lock"
rm laravel-echo-server.lock

echo "starting supervisor"
service supervisor start %

echo "starting laravel echo server"
supervisorctl reread
supervisorctl update

echo "running migrate install"
cd /var/www/html &&
php artisan migrate:install

echo "running migrate"
cd /var/www/html &&
php artisan migrate

echo "create search index"
php artisan elastic:create-index "App\MyIndexConfigurator"

apachectl -D FOREGROUND
