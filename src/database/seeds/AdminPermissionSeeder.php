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
            ['uuid' => '9a41c703-0ec1-4fea-9642-b744e4bf95a7',  'name' => 'admin.user.list',                            'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '89048ea7-af7a-4466-8ef4-5bf74e1a481e',  'name' => 'admin.user.create',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'dab3dcf7-e119-4b72-8498-99cf3843ca9c',  'name' => 'admin.user.get',                             'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            
            ['uuid' => 'c06c3747-61e0-4c6a-8301-49b5215c0fde',  'name' => 'admin.customField.access',                   'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            
            ['uuid' => '27de8ccf-f599-41f1-b34e-8a3bcd454f86',  'name' => 'admin.customField.field.access',             'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'c8ea7490-31b9-4fb8-9dcd-5ceecd1ad123',  'name' => 'admin.customField.field.list',               'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '7cc98fcc-fe4c-4d7e-baea-b21adc027a91',  'name' => 'admin.customField.field.create',             'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '2328f597-206e-48c6-b5b0-aa2246798bc1',  'name' => 'admin.customField.field.get',                'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            
            ['uuid' => '7781281b-9095-4298-a032-445ae4930589',  'name' => 'admin.customField.fieldGroup.access',        'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '3f9c9bcd-455f-412c-94a0-0bb61d3976e2',  'name' => 'admin.customField.fieldGroup.list',          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '44fccaf5-375e-4f61-879d-95120b874346',  'name' => 'admin.customField.fieldGroup.create',        'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '2411053b-584e-4640-8b5e-1a7ffe6392a3',  'name' => 'admin.customField.fieldGroup.get',           'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            
            ['uuid' => 'e422d658-fbfe-49d6-a4b0-d7b3bec43108',  'name' => 'admin.attachment.access',                    'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '1a97aa6e-3e7f-465e-90e8-f97c9c0a4e16',  'name' => 'admin.attachment.attachmentFamily.access',   'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '427f6565-31b5-44e3-a131-13973a286f0f',  'name' => 'admin.attachment.attachmentFamily.list',     'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '62d3e56e-31ab-425c-ab3f-1439b4e2e640',  'name' => 'admin.attachment.attachmentFamily.create',   'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'ec969c71-29b1-4c80-88cd-635512807b68',  'name' => 'admin.attachment.attachmentFamily.get',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '9a37e368-b418-4d62-ad60-3b0110e4635f',  'name' => 'admin.package.access',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'ed590725-2eec-4942-b352-ba8ca3f5f9a6',  'name' => 'admin.package.list',                         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '848a5574-1e35-4e29-8438-18404e31a951',  'name' => 'admin.package.create',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'a905711d-4c69-486a-8e54-63e088ba55e7',  'name' => 'admin.package.get',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '9bc6e1c0-9c1e-448f-8ae2-e1d36f11252d',  'name' => 'admin.lang.access',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '17ddeab3-181e-441b-9b8b-b5197729d14d',  'name' => 'admin.lang.list',                            'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'f3e0be13-7fe4-4b52-bdd5-5d66d060a3f1',  'name' => 'admin.lang.create',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'e05c6509-305b-465e-bd33-221ec9d163b6',  'name' => 'admin.lang.get',                             'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '18be5b5e-227b-4ac0-92a9-182f2f2645a9',  'name' => 'admin.country.access',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '099a878c-7a4f-45c6-bef5-1f5a36ceec0f',  'name' => 'admin.country.list',                         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '10681637-224d-46a0-9f08-56b250c0198a',  'name' => 'admin.country.create',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'afdba55c-540e-4a72-a9c9-6909cc9f3d36',  'name' => 'admin.country.get',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '183a0ca4-7558-43c5-bcc4-4b2b9093a8eb',  'name' => 'admin.administrativeAreaLevel1.access',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'd0d03b53-9346-4313-8b03-b3fa616f2bc3',  'name' => 'admin.administrativeAreaLevel1.list',        'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '07002d11-683c-4bdd-a719-51a79f2bf1fe',  'name' => 'admin.administrativeAreaLevel1.create',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '45f4c516-11cb-43b2-a56f-fbf3ef89fa74',  'name' => 'admin.administrativeAreaLevel1.get',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '070f560f-218f-48f5-a0dc-fd349bcc6348',  'name' => 'admin.administrativeAreaLevel2.access',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'deaf8669-9d71-48b9-951a-5a1db4de0b7d',  'name' => 'admin.administrativeAreaLevel2.list',        'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '0b26565c-b2cd-4eca-b4d7-d4d5fd3a382e',  'name' => 'admin.administrativeAreaLevel2.create',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '64802a51-079a-4fcd-8b88-ed430604983f',  'name' => 'admin.administrativeAreaLevel2.get',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => 'c1c43cdf-13f7-4301-892c-b7a7f9b148fd',  'name' => 'admin.administrativeAreaLevel3.access',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'a8ba51d6-2c2f-4eb4-b557-d4b64389c001',  'name' => 'admin.administrativeAreaLevel3.list',        'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'c9748e58-33dc-4b14-9c1d-c82142a9d990',  'name' => 'admin.administrativeAreaLevel3.create',      'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'e0419656-b758-4b7c-b54e-4b7c562f418a',  'name' => 'admin.administrativeAreaLevel3.get',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '096ac555-09a8-4603-b082-5e1e1ad51db1',  'name' => 'admin.profile.access',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '9b7cccff-689b-49dc-9b11-37f387accc12',  'name' => 'admin.profile.list',                         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '4bf07675-d824-4d87-8589-73f98adc1909',  'name' => 'admin.profile.create',                       'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '42ec287d-ea16-4a2f-9ad6-d2fe99304f18',  'name' => 'admin.profile.get',                          'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => 'c3f07181-ef34-4905-94fc-8c8af191153c',  'name' => 'admin.permission.access',                    'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '51d0ea94-2138-45b1-91ca-c150c8cdea48',  'name' => 'admin.permission.role.access',               'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'f2aa6195-afb6-4e30-b4e7-3e836e68ccdb',  'name' => 'admin.permission.role.list',                 'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '03eff917-097a-41db-9401-f73e63fec943',  'name' => 'admin.permission.role.create',               'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '3fd068ff-3e02-42eb-a174-478f80c5ffba',  'name' => 'admin.permission.role.get',                  'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => '1d7d1492-ed1c-477d-bce7-1f4106cc929e',  'name' => 'admin.permission.permission.access',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'e7a2e324-8b3d-46ca-94c8-dc527a8e6ffd',  'name' => 'admin.permission.permission.list',           'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'b5406a8a-6e12-4ec6-b04b-b7f05cdb1521',  'name' => 'admin.permission.permission.create',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'd5eca3c5-7a50-4d5f-b49a-4058d7cc4e65',  'name' => 'admin.permission.permission.update',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '285a0d60-d67d-4414-8ec4-30bfc86a78d3',  'name' => 'admin.permission.permission.get',            'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'b7b0d036-9636-4abe-bdf5-07e562c23e75',  'name' => 'admin.permission.permission.delete',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '52ab2bf1-571a-4c98-ad4c-ff3f72085a51',  'name' => 'admin.permission.permission.export',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '677586c6-25d4-4345-8cd6-e9e052909c39',  'name' => 'admin.permission.permission.import',         'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],

            ['uuid' => 'f64e1648-ed4a-4bbb-a53b-e673b36b1612',  'name' => 'admin.permission.resource.access',           'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => 'ea87b98f-b91e-4072-b394-79152ae902fd',  'name' => 'admin.permission.resource.list',             'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '8eb2642b-2016-4521-80be-89457f7550b7',  'name' => 'admin.permission.resource.create',           'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
            ['uuid' => '4527673c-c353-47dd-9d2c-9f9596aabebd',  'name' => 'admin.permission.resource.get',              'package_uuid' => '9e8dbba3-b82b-406f-b71f-060a0494ffba'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="AdminPermissionSeeder"
 */
