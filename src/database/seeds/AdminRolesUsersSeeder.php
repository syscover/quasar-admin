<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRolesUsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_roles_users')->insert([
            'role_uuid' => 'd8d49e59-81c0-4222-b92e-b127f5853a38',
            'user_uuid' => '78982281-2974-4fac-8bbb-cadbffe0aa27'
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminRolesUsersSeeder"
 */
