# febpos-backend
Laravel API to serve Point Of Sale System with record tracking

## Setup

Ensure you are running **composer 2.6.6** or **greater**
Ensure you are running **php ^8.1** or **greater**

Run composer install:

    composer install

Copy and setup env file

    cp .env.example .env

On the .env file created Set the following - **DB_USERNAME** - **DB_PASSWORD**

Migrate and seed all working data:

    php artisan migrate --seed

## Happy Coding
