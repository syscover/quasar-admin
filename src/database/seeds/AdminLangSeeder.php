<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Lang;

class AdminLangSeeder extends Seeder
{
    public function run()
    {
        Lang::insert([
            ['uuid' => '94c893c1-3eb7-4f22-a878-b405c6d42e09', 'name' => 'Deutsch',   'image' => 'de', 'iso_639_2' => 'de', 'iso_639_3' => 'deu', 'ietf' => 'de-DE', 'sort' => '0', 'is_active' => '0'],
            ['uuid' => '7c4754e7-3363-48ca-af99-632522226b51', 'name' => 'English',   'image' => 'gb', 'iso_639_2' => 'en', 'iso_639_3' => 'eng', 'ietf' => 'en-US', 'sort' => '0', 'is_active' => '0'],
            ['uuid' => '4470b5ab-9d57-4c9d-a68f-5bf8e32f543a', 'name' => 'Español',   'image' => 'es', 'iso_639_2' => 'es', 'iso_639_3' => 'spa', 'ietf' => 'es-ES', 'sort' => '1', 'is_active' => '1'],
            ['uuid' => '47ecef11-3d7d-426b-967d-31f2f737b65c', 'name' => 'Français',  'image' => 'fr', 'iso_639_2' => 'fr', 'iso_639_3' => 'fra', 'ietf' => 'fr-FR', 'sort' => '0', 'is_active' => '0']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminLangSeeder"
 */
