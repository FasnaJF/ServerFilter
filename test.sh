docker exec -ti serverfilter_app_1 php artisan config:cache --env=testing

docker exec -ti serverfilter_app_1 php artisan migrate --env=testing

docker exec -ti serverfilter_app_1 php artisan test
