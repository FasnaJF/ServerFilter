

docker exec -ti serverfilter_app_1 chmod -R 777 /var/www/storage

docker exec -ti serverfilter_app_1 composer install

docker exec -ti serverfilter_app_1 php artisan key:generate

docker exec -ti serverfilter_app_1 php artisan config:cache

docker exec -ti serverfilter_app_1 php artisan migrate

docker exec -ti serverfilter_app_1 php artisan storage:link

docker exec -ti serverfilter_app_1 php artisan app:process-excel-file

docker exec -ti serverfilter_app_1 php artisan queue:work
