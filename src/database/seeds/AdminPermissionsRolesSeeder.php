<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Quasar\Admin\Models\Permission;

class AdminPermissionsRolesSeeder extends Seeder
{
    public function run()
    {
        $permissions = Permission::all();
        $rolesPermissions = [];
        foreach ($permissions as $permission)
        {
            $rolesPermissions[] = [
                'permission_uuid'   => $permission->uuid, 
                'role_uuid'         => 'd8d49e59-81c0-4222-b92e-b127f5853a38' // admin role
            ];
        }

        DB::table('admin_permissions_roles')->insert($rolesPermissions);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminPermissionsRolesSeeder"
 */
