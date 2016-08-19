## Instalation

1) Clone project https://github.com/Littie/todo.git
2) Install vendor: composer install
3) Update project: composer update
4) Rename .env.example to .env
5) Generate ket: php artisan key:generate
6) In .env file set options for your DB
   DB_CONNECTION=mysql
   DB_HOST=your database host
   DB_PORT=3306
   DB_DATABASE=your database name
   DB_USERNAME=your database user's name
   DB_PASSWORD=youe database user's password
7) Migrate tables: php artisan migrate
8) Add seeds: php artisan db:seed

Admin:
username: admin@admin.ad
password: 123456