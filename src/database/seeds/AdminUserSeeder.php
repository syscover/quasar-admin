<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'uuid'          => '78982281-2974-4fac-8bbb-cadbffe0aa27',  
                'name'          => 'John', 
                'surname'       => 'Doe',
                'email'         => 'john@gmail.com',
                'lang_uuid'     => '4470b5ab-9d57-4c9d-a68f-5bf8e32f543a',
                'username'      => 'john@gmail.com',
                'password'      => Hash::make('1111'),
                'is_active'     => true
            ],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminUserSeeder"
 */
