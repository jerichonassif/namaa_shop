<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Namaa Shop

Namaa Shop is a product site. Site features:

----- In Control Panel

● The ability to log in and out of the CMS control panel with the type of ADMIN users.

● The ability to add, modify, and delete products from the panel with the privileges of the panel administrator
ADMIN


○ The product consists of the following fields:

■ title

■ description

■ photo

■ Stock

■ Created and last modified

=========================

----- website

● The possibility of creating an account or logging in and out to the site as CUSTOMER users.

● Show products to users with the ability to add them to the user's basket in case
A stock In with the ability to enter Quantity.

Product was in stock

● The ability to view the basket.

● Possibility to empty the basket or delete an item

## How to install the system

- copy file .env.example and rename to .env and add DB_DATABASE=shopping_cart and create new database: shopping_cart

- composer install

- php artisan key:generate

- npm install && npm run dev 

- php artisan migrate:fresh --seed

- php artisan serve

- enter email admin for dashboard : admin@app.com && password : password .

- enter email customer : customer@app.com && password : password .

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
