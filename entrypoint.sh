#!/bin/bash -xe

if [[ $APP_ENV == "local" ]]
then
    npm install
    nohup npm run dev &
    composer install --no-scripts
    php artisan key:generate
    php artisan config:clear
fi


php artisan queue:work &
php artisan serve --host=0.0.0.0 --port=$APP_PORT
