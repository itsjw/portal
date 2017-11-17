#!/usr/bin/env bash

php artisan down --message="Updating.."
composer install
rm -rf node_modules/
yarn && yarn run production
php artisan storage:link
php artisan up