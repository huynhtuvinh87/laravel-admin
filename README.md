# Larawind - Laravel 10.0+ Jetstream and Tailwind CSS Admin Theme

This project is created with [Laravel Jetstream](https://jetstream.laravel.com/1.x/introduction.html) Framework and [Tailwind CSS](https://tailwindcss.com)

## Requirements

-   Laravel installer
-   Composer
-   Npm installer

## Installation

```
# Clone the repository from GitHub and open the directory:
git clone https://github.com/huynhtuvinh87/laravel-admin.git

# cd into your project directory
cd laravel-admin

#install composer and npm packages
composer install
npm install && npm run dev

# Start prepare the environment:
cp .env.example .env // setup database credentials
php artisan key:generate
php artisan migrate
php artisan storage:link

# Run your server
php artisan serve

```
