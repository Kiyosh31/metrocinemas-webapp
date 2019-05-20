# Metrocinemas webapp

This project is made with laravel, for the management of a movie site.

# Prerequisites

-   Install [Laragon](https://laragon.org/)

# Installation

You must run laragon on your local machine and in the command line:
Clone the repository on your machine

```
git clone https://github.com/Kiyosh31/metrocinemas-webapp.git
```

Move to your poject folder

1. Install dependencies

```
composer install
```

2. Rename .env.example as .env

```
cp .env.example .env
```

3. Generate a new APP_KEY

```
php artisan key:generate
```

4. Generate Database

```
php artisan migrate
```

EXTRA: If you want to populate de DB with users, movies and auditoriums

```
composer dump-autoload
```

```
php artisan db:seed
```

Users:

-   Admin -> admin@test.com
    password -> secret
-   employee -> emp@test.com
    password -> secret

# Usage

In laragon command line

```
php artisan serve
```

Open localhost:8000 on your browser

# Author

-   David Garcia [Kiyosh31](https://github.com/Kiyosh31)
