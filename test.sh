php artisan config:cache --env=testing

php artisan migrate --force --env=testing

php artisan test

php artisan config:cache #reset to local environment from testing environment