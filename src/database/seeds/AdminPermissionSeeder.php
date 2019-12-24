<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::insert([
            // admin
            ['uuid' => 'ee89bd9b-6b24-44da-82d8-23059e134661',  'name' => 'admin.access',                               'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '270914b4-2eba-4d45-b5c2-1677f8f717a4',  'name' => 'admin.user.access',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'c06c3747-61e0-4c6a-8301-49b5215c0fde',  'name' => 'admin.custom_field.access',                  'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '7781281b-9095-4298-a032-445ae4930589',  'name' => 'admin.custom_field.field_group.access',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '3f9c9bcd-455f-412c-94a0-0bb61d3976e2',  'name' => 'admin.custom_field.field_group.list',        'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '44fccaf5-375e-4f61-879d-95120b874346',  'name' => 'admin.custom_field.field_group.create',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '2411053b-584e-4640-8b5e-1a7ffe6392a3',  'name' => 'admin.custom_field.field_group.get',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'e422d658-fbfe-49d6-a4b0-d7b3bec43108',  'name' => 'admin.attachment.access',                    'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '1a97aa6e-3e7f-465e-90e8-f97c9c0a4e16',  'name' => 'admin.attachment.attachment_family.access',  'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '427f6565-31b5-44e3-a131-13973a286f0f',  'name' => 'admin.attachment.attachment_family.list',    'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '62d3e56e-31ab-425c-ab3f-1439b4e2e640',  'name' => 'admin.attachment.attachment_family.create',  'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'ec969c71-29b1-4c80-88cd-635512807b68',  'name' => 'admin.attachment.attachment_family.get',     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '9a37e368-b418-4d62-ad60-3b0110e4635f',  'name' => 'admin.package.access',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '9bc6e1c0-9c1e-448f-8ae2-e1d36f11252d',  'name' => 'admin.lang.access',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '096ac555-09a8-4603-b082-5e1e1ad51db1',  'name' => 'admin.profile.access',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'c3f07181-ef34-4905-94fc-8c8af191153c',  'name' => 'admin.permission.access',                    'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '51d0ea94-2138-45b1-91ca-c150c8cdea48',  'name' => 'admin.permission.role.access',               'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '1d7d1492-ed1c-477d-bce7-1f4106cc929e',  'name' => 'admin.permission.permission.access',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'e7a2e324-8b3d-46ca-94c8-dc527a8e6ffd',  'name' => 'admin.permission.permission.list',           'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'b5406a8a-6e12-4ec6-b04b-b7f05cdb1521',  'name' => 'admin.permission.permission.create',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'd5eca3c5-7a50-4d5f-b49a-4058d7cc4e65',  'name' => 'admin.permission.permission.update',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '285a0d60-d67d-4414-8ec4-30bfc86a78d3',  'name' => 'admin.permission.permission.get',            'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'b7b0d036-9636-4abe-bdf5-07e562c23e75',  'name' => 'admin.permission.permission.delete',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '52ab2bf1-571a-4c98-ad4c-ff3f72085a51',  'name' => 'admin.permission.permission.export',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '677586c6-25d4-4345-8cd6-e9e052909c39',  'name' => 'admin.permission.permission.import',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'f64e1648-ed4a-4bbb-a53b-e673b36b1612',  'name' => 'admin.permission.resource.access',           'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminPermissionSeeder"
 */
