<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(AdminLangSeeder::class);
        $this->call(AdminPackageSeeder::class);
        $this->call(AdminPermissionSeeder::class);
        $this->call(AdminResourceSeeder::class);
        $this->call(AdminProfileSeeder::class);
        $this->call(AdminRoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AdminPermissionsRolesSeeder::class);
        $this->call(AdminRolesUsersSeeder::class);
        
        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminSeeder"
 */
