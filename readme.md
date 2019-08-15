### Requirements

PHP 7.1.3+

PHP Sqlite Driver

Composer

### Setup

```
composer install
cp .env.example .env
```

### Load/Refresh test data

The project uses sqlite as the db driver. You can reload the migration and test data:

`php artisan migrate:refresh && php artisan db:seed`

### Automated tests

Use PHPUnit from the vendor folder:

`./vendor/bin/phpunit` 

### API

Serve the application: `php -S localhost:8000 -t public`
