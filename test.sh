docker exec -ti serverfilter_app_1 php artisan cache:clear

docker exec -ti serverfilter_app_1 php artisan migrate --env=testing

docker exec -ti serverfilter_app_1 php artisan test
