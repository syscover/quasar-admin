# Quasar Core App for Laravel

[![Total Downloads](https://poser.pugx.org/quasar/admin/downloads)](https://packagist.org/packages/quasar/admin)
[![Latest Stable Version](http://img.shields.io/github/release/syscover/quasar-admin.svg)](https://packagist.org/packages/quasar/admin)

Quasar is a application that generates a control panel where you can create custom solutions.

---

## Installation

**1 - After install Laravel framework, execute on console:**
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
php artisan db:seed --class="AdminTableSeeder"
```

**6 - Add graphQL routes in graphql/schema.graphql file**
```
# Core
#import ./../vendor/syscover/pulsar-core/src/Syscover/Core/GraphQL/scalars.graphql
#import ./../vendor/syscover/pulsar-core/src/Syscover/Core/GraphQL/inputs.graphql
#import ./../vendor/syscover/pulsar-core/src/Syscover/Core/GraphQL/types.graphql

# Admin types
#import ./../vendor/syscover/pulsar-admin/src/Syscover/Admin/GraphQL/inputs.graphql
#import ./../vendor/syscover/pulsar-admin/src/Syscover/Admin/GraphQL/types.graphql

type Query {
    # Core
    #import ./../vendor/syscover/pulsar-core/src/Syscover/Core/GraphQL/queries.graphql
    
    # Admin queries
    #import ./../vendor/syscover/pulsar-admin/src/Syscover/Admin/GraphQL/queries.graphql
}

type Mutation {
    # Core
    #import ./../vendor/syscover/pulsar-core/src/Syscover/Core/GraphQL/mutations.graphql
    
    # Admin mutations
    #import ./../vendor/syscover/pulsar-admin/src/Syscover/Admin/GraphQL/mutations.graphql
}
```

**7 - You can access these data**
```
user: john@gmail.com
pasword: 1111
```

**8 - To run unit testing**
```
./vendor/bin/phpunit
```