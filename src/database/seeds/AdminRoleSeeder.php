<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Role;

class AdminRoleSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['uuid' => 'd8d49e59-81c0-4222-b92e-b127f5853a38',  'name' => 'Administrator', 'is_master' => true],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminRoleSeeder"
 */
