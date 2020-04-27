# Quasar Admin App for Laravel

[![Total Downloads](https://poser.pugx.org/quasar/admin/downloads)](https://packagist.org/packages/quasar/admin)
[![Latest Stable Version](http://img.shields.io/github/release/syscover/quasar-admin.svg)](https://packagist.org/packages/quasar/admin)

Quasar is a application that generates a control panel where you can create custom solutions.

---

## Installation

**1 -To avoid conflicts we will eliminate the default migrations of laravel, from root directory**
```
rm -rf database/migrations/*
```

**2 - After install Laravel framework, execute on console:**
```
composer require quasar/admin
```

**2 - Execute publish command**
```
php artisan vendor:publish --provider="Quasar\Admin\AdminServiceProvider"
```

**3 - Set environment variables in .env file**
```
ADMIN_BASE_LANG=en
```

**4 - Config laravel queue, in file config/queue.php replace database connection by**
```
...
'database' => [
    'driver' => 'database',
    'table' => 'admin_job',
    'queue' => 'default',
    'retry_after' => 90,
],
...
```

```
...
'failed' => [
    'driver' => env('QUEUE_FAILED_DRIVER', 'database'),
    'database' => env('DB_CONNECTION', 'mysql'),
    'table' => 'admin_failed_jobs',
],
...
```
after that set your QUEUE_CONNECTION environment variable with database value
```
QUEUE_CONNECTION=database
```

**5 - Execute migrations and seed database**
```
composer dump-autoload
php artisan queue:table
php artisan migrate
php artisan db:seed --class="AdminSeeder"
php artisan db:seed --class="OAuthSeeder"
```

**6 - You can access with this credentials**
```
user: john@gmail.com
pasword: 1111
```

**7 - To run unit testing**
```
./vendor/bin/phpunit
```

## Tips
**1 - You can use a graphQL playground in this URL**
```
http://your-domain/graphql-playground
```
replace "your-domain" for domain where laravel is installed