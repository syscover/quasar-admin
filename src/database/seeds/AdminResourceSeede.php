<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Resource;

class AdminResourceSeeder extends Seeder
{
    public function run()
    {
        Resource::insert([
            ['uuid' => '',  'name' => 'admin.user',                 'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminRoleSeeder"
 */
