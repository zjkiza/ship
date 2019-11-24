Instructions for the programmer

- to install components : composer install
- run server : php artisan serv
- create database on you server
- on file .env input you data for : 
    - DB_DATABASE=name-of-your-base
    - DB_USERNAME=user-name
    - DB_PASSWORD=password-for-databases

- to create user table run : php artisan make:migration 
- add admin user : php artisan db:seed
- for testing in file .env setting : 
    - QUEUE_CONNECTION=sync
    - MAIL_DRIVER=log
- login parameters : 
    - E-Mail Address : admin@gmail.com
    - Password : admin     
- on route /telescope , you can see testing parameters. 