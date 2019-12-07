<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Package;

class AdminPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 1,     'uuid' => 'f405132f-786d-4a6a-a262-0e6a6518aec3',   'name' => 'Application',        'root' => 'app',            'sort' => 1,    'is_active' => 1],
            ['id' => 2,     'uuid' => '2de64a15-1a30-49f9-86a8-8bcfa4f60dec',   'name' => 'Kitchen Sink',       'root' => 'kitchen-sink',   'sort' => 2,    'is_active' => 0],
            ['id' => 20,    'uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba',   'name' => 'Admin',              'root' => 'admin',          'sort' => 20,   'is_active' => 0],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminPackageSeeder"
 */
