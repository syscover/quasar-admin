<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Resource;

class AdminResourceSeeder extends Seeder
{
    public function run()
    {
        Resource::insert([
            ['uuid' => 'dd18d581-c785-44bf-839a-f778b82169f6',      'name' => 'admin',                              'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '8afef282-97b7-4802-9238-37c5f511e12b',      'name' => 'admin.user',                         'has_custom_fields' => true,    'has_attachments' => true,      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'f2c7c28a-807b-4d35-8967-b66d3b602aed',      'name' => 'admin.custom_field',                 'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'df939149-bd99-4973-95ea-b3a29b484e56',      'name' => 'admin.custom_field.field_group',     'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'ddc8ed59-46f8-43cd-8f91-64d300c60d61',      'name' => 'admin.custom_field.field',           'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '8dbc61a6-ec74-45e9-80fa-d0ffc1679b46',      'name' => 'admin.package',                      'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '08e3aafe-0679-475e-bac6-d105e889220d',      'name' => 'admin.lang',                         'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '91f788fc-10b6-4384-9cfd-4df60c7a5a92',      'name' => 'admin.profile',                      'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'f71fc7f7-a6d9-4e55-aa60-3be461fd3663',      'name' => 'admin.permission',                   'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '11a9be28-b73e-4402-9bbf-30145e4fce4a',      'name' => 'admin.permission.role',              'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '4ac02211-ca9f-4574-accc-c05d37fa349c',      'name' => 'admin.permission.permission',        'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '6a699ed5-41a3-4155-a1c7-b112adea3939',      'name' => 'admin.permission.resource',          'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminResourceSeeder"
 */
