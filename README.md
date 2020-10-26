<p align="center"><a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100"></a>
</p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>


## Задание
﻿Спарсить c youtube видео о товарах из файла.


## Start parsing

    $ php artisan product:import
    
## Install
.env.example переименовать в .env,
добавить доступы для бд:

```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Далее

    $ composer insatall
    $ php artisan key:generate
    $ php artisan migrate
    $ npm install
    $ npm run prod
    
Подробнее о настройке Laravel на сервере: [link](https://beget.com/ru/kb/how-to/web-apps/ustanovka-php-frejmvorkov#ustanovka-laravel)



## DEMO

Результат можно посмотреть по ссылке: [link](http://parser-youtube.devzsg.net/).
