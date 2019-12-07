<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Profile;

class AdminProfileSeeder extends Seeder
{
    public function run()
    {
        Profile::insert([
            ['uuid' => 'dbb8aa7b-af54-4b70-a36e-0aba6b8e1abd',  'name' => 'Profile 01'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminProfileSeeder"
 */
