# Product Manager Project

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone git@github.com:Bluesman98/product-manager.git
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database blog
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```
## Notes

The seeding will create one user with 3 categories and 5 posts in each category

If the uploaded images are not loading run this command:

```
php artisan storage:link
```

