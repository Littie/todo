## Instalation

1) Clone project https://github.com/Littie/todo.git <br/>
2) Install vendor: composer install \n
3) Update project: composer update \n
4) Rename .env.example to .env \n
5) Generate ket: php artisan key:generate \n
6) In .env file set options for your DB \n
   DB_CONNECTION=mysql \n
   DB_HOST=your database host \n
   DB_PORT=3306 \n
   DB_DATABASE=your database name \n
   DB_USERNAME=your database user's name \n
   DB_PASSWORD=youe database user's password \n
7) Migrate tables: php artisan migrate \n
8) Add seeds: php artisan db:seed \n

Admin: \n
username: admin@admin.ad \n
password: 123456 \n
