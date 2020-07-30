#!/bin/sh
echo "Hello,"$USER".  This script will clear your cache"
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear