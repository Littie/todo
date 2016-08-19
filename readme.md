## Instalation

1) Clone project https://github.com/Littie/todo.git <br/>
2) Install vendor: composer install <br/>
3) Update project: composer update <br/>
4) Rename .env.example to .env <br/>
5) Generate key: php artisan key:generate <br/>
6) In .env file set options for your DB <br/>
<ul>
   <li>DB_CONNECTION=mysql </li>
   <li>DB_HOST=your database host </li>
   <li>DB_PORT=3306 </li>
   <li>DB_DATABASE=your database name </li>
   <li>DB_USERNAME=your database user's name </li>
   <li>DB_PASSWORD=youe database user's password </li>
</ul>   
7) Migrate tables: php artisan migrate <br/>
8) Add seeds: php artisan db:seed <br/>

Admin: <br/>
username: admin@admin.ad <br/>
password: 123456 <br/>
