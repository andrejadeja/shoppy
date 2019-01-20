<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

Nakon preuzimanja fajlova potrebno je krerati MySql bazu sa sledećim parametrima:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shoppy
DB_USERNAME=root
DB_PASSWORD=


Potrebno je pokrenuti migracije komandom:

php artisan migrate

Zatim Seed-ujemo bazu komandom: 

php artisan db:seed


U bazu se upisuju fake podaci i aplikacija je spremna za korišćenje.

Startujemo aplikaciju na portu 8000 komandom:

php artisan serv

Login email možete pogledati u tabel users jer je i ta tabela popunjena fake podacima
password je "secret"


Napomena:

Baza se migrira sa osnovnim tablema i zatim se one update-uju kako bi aplikacija podržala mogućnost da se proširi na više prodavnica (tačka 7 iz zadatka)
Ukoliko ne želite samo osnovnu vrziju aplikacije za klijenta iz foldera migrations obrišite sve UPDATE fajlove.




