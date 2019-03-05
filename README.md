# Metrocinemas webapp

This project is made with laravel, for the management and correct sell the tickets of a cinema.

# Prerequisites
- Install [Laragon](https://laragon.org/) 

# Installation
You must run laragon on your local machine and in the command line:
Clone the repository on your machine
```
git clone https://github.com/Kiyosh31/metrocinemas-webapp.git
```
Move to your poject folder
Install dependencies
```
composer install 
```

Rename .env.example as .env
Generate a new APP_KEY
```
php artisan key:generate
```

Generate Database
```
php artisan migrate
```

# Usage

In laragon command line

```
php artisan serve
```

# Author
* David Garcia (Kiyosh31)
