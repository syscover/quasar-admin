<?php

return [
    //******************************************************************************************************************
    //***   Base lang, set main application language
    //******************************************************************************************************************
    'base_lang' => env('ADMIN_BASE_LANG', 'en'),

    //******************************************************************************************************************
    //***   Relation between iso_639_2 and land uuid to base_lang function
    //******************************************************************************************************************
    'langs' => [
        'de'    => '94c893c1-3eb7-4f22-a878-b405c6d42e09',
        'en'    => '7c4754e7-3363-48ca-af99-632522226b51',
        'es'    => '4470b5ab-9d57-4c9d-a68f-5bf8e32f543a',
        'fr'    => '47ecef11-3d7d-426b-967d-31f2f737b65c',
    ],

    //******************************************************************************************************************
    //***   Fit types for attachment families
    //******************************************************************************************************************
    'fit_types' => [
        (object)['uuid' => 'c7402ae0-84f2-4fd2-bc80-871a3c2fab38', 'id' => 1, 'name' => 'admin::quasar.fit_crop'],
        (object)['uuid' => '609b5b79-f5cb-45cb-ba08-1c2220b54b91', 'id' => 2, 'name' => 'admin::quasar.width'],
        (object)['uuid' => '7a1d9ebf-db57-4e3b-89d1-3feef931e75b', 'id' => 3, 'name' => 'admin::quasar.height'],
        (object)['uuid' => 'ca2f4e27-8b74-4543-b2a8-c8fa6fda3fa4', 'id' => 4, 'name' => 'admin::quasar.width_free_crop'],
        (object)['uuid' => '066bdff2-0ea4-497c-893b-7e13a60f21d1', 'id' => 5, 'name' => 'admin::quasar.height_free_crop']
    ],

    //******************************************************************************************************************
    //***  Sizes to create images for various screen sizes
    //******************************************************************************************************************
    'formats' => [
        (object)['uuid' => '6fc7bbfe-523d-41ed-b469-57e5584b4e86', 'id' => 1,   'value' => 'jpg',      'name' => 'jpg'],
        (object)['uuid' => 'f58d54ab-e45e-4864-bb8a-fcf54e09c156', 'id' => 2,   'value' => 'png',      'name' => 'png'],
        (object)['uuid' => '80e4e4fd-c342-4629-ab55-122d0a03b35c', 'id' => 3,   'value' => 'gif',      'name' => 'gif'],
        (object)['uuid' => 'b29b2c6f-fbec-4347-9073-31cc55c6b4de', 'id' => 4,   'value' => 'tif',      'name' => 'tif'],
        (object)['uuid' => '015de721-969e-4e1b-b18a-6d351da84650', 'id' => 5,   'value' => 'bmp',      'name' => 'bmp'],
        (object)['uuid' => '8078315d-b4ab-4e7c-8963-c55a01ec69d9', 'id' => 6,   'value' => 'data-url', 'name' => 'data-url'],
    ],

    //******************************************************************************************************************
    //***  Sizes to create images for various screen sizes
    //******************************************************************************************************************
    'sizes' => [
        (object)['uuid' => '24acae81-6049-4147-8a29-fbb89ab51261', 'id' => 1,   'value' => 25,      'name' => '-25%'],
        (object)['uuid' => '3a0d114e-f6ad-4dde-ad79-2525ba1f2db9', 'id' => 2,   'value' => 50,      'name' => '-50%'],
        (object)['uuid' => '5d0ee94f-c1c9-41a7-af13-f9198ec18441', 'id' => 3,   'value' => 75,      'name' => '-75%'],
    ],

    //******************************************************************************************************************
    //***   Type fields to select on fields section
    //******************************************************************************************************************
    'field_types' => [
        (object)['uuid' => 'c0841223-fc7f-462f-b1ba-d2966c5829e6', 'id' => 1,       'name' => 'Checkbox',               'values' => false],
        (object)['uuid' => '39bcd945-e7b8-442c-9d74-3c5ca6d561a2', 'id' => 2,       'name' => 'Email',                  'values' => false],
        (object)['uuid' => '1369a381-1bd0-4e6e-a995-f6bb21b45bb7', 'id' => 3,       'name' => 'Model',                  'values' => false],
        (object)['uuid' => '0c39cd02-a1cd-48e2-a4a9-232ccb84d268', 'id' => 4,       'name' => 'Number',                 'values' => false],
        (object)['uuid' => '76448f64-c6c6-47fb-9306-2dc568dd5ab4', 'id' => 5,       'name' => 'Select',                 'values' => true],
        (object)['uuid' => '62ccb49e-e3d5-4fcf-96e5-3a88768150b0', 'id' => 6,       'name' => 'Select multiple',        'values' => true],
        (object)['uuid' => '2794afa7-b636-410b-9c7a-e1709e26dfaa', 'id' => 7,       'name' => 'Text',                   'values' => false],
        (object)['uuid' => '15eb7b5f-1124-4fa6-9617-dc00e0f5df7a', 'id' => 8,       'name' => 'Text Area',              'values' => false],
        (object)['uuid' => '734717f5-e3de-413f-973d-52a740f5bb27', 'id' => 9,       'name' => 'Wysiwyg',                'values' => false],
        (object)['uuid' => '3c88c7ea-12e1-4fc5-a52f-2e11de0864a8', 'id' => 10,      'name' => 'Date',                   'values' => false],
        (object)['uuid' => 'e525d854-73fb-4697-afd8-f0d4f53beb27', 'id' => 11,      'name' => 'Datetime',               'values' => false],
        (object)['uuid' => '0659ebe7-e6ac-41fb-87ec-f35c7195969e', 'id' => 12,      'name' => 'Header',                 'values' => false],
    ],

    //******************************************************************************************************************
    //***   Type data to select on fields section
    //******************************************************************************************************************
    'data_types' => [
        (object)['uuid' => '5504d873-39de-4a75-940e-b35c172dbe6f', 'id' => 1,      'name' => 'String',            'type' => 'string'],
        (object)['uuid' => '09820254-7004-4858-8d3e-21d2e3a701a5', 'id' => 2,      'name' => 'Boolean',           'type' => 'boolean'],
        (object)['uuid' => 'f4155d66-d405-4b0e-8be8-f77ed168f7ae', 'id' => 3,      'name' => 'Integer',           'type' => 'integer'],
        (object)['uuid' => '608b69db-b8df-48c7-9a37-2add3827104e', 'id' => 4,      'name' => 'Float',             'type' => 'float'],
        (object)['uuid' => '280533f9-0e35-482b-80bc-1a075af21be6', 'id' => 5,      'name' => 'Array',             'type' => 'array'],
        (object)['uuid' => 'f613c4f2-a5e5-4966-a80d-7edf6723cba5', 'id' => 6,      'name' => 'Object',            'type' => 'object'],
    ],

    //******************************************************************************************************************
    //***   Resources that could contain reports
    //******************************************************************************************************************
    'field_sources' => [
        /* (object)[
            'id'                => 1,    
            'name'              => 'admin::pulsar.countries',                 
            'translateable'     => true,        
            'type'              => 'database',   
            'model'             => 'Syscover\Admin\Models\Country',         
            'package'           => 1,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 2,    
            'name'              => 'admin::pulsar.profiles',                 
            'translateable'     => true,        
            'type'              => 'database',   
            'model'             => 'Syscover\Admin\Models\Profile',         
            'package'           => 1,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 3,    
            'name'              => 'forem::pulsar.unemployed_situations',
            'translateable'     => false,       
            'type'              => 'config',     
            'model'             => 'pulsar-forem.unemployed_situations',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 4,    
            'name'              => 'forem::pulsar.expedient',
            'translateable'     => false,       
            'type'              => 'database',     
            'model'             => 'Syscover\Forem\Models\Expedient',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 5,    
            'name'              => 'forem::pulsar.action',
            'translateable'     => false,       
            'type'              => 'database',     
            'model'             => 'Syscover\Forem\Models\Action',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 6,    
            'name'              => 'forem::pulsar.group',
            'translateable'     => false,       
            'type'              => 'database',     
            'model'             => 'Syscover\Forem\Models\Group',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 7,    
            'name'              => 'forem::pulsar.employment_office',
            'translateable'     => false,       
            'type'              => 'database',     
            'model'             => 'Syscover\Forem\Models\EmploymentOffice',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 8,    
            'name'              => 'forem::pulsar.province',
            'translateable'     => false,       
            'type'              => 'database',     
            'model'             => 'Syscover\Forem\Models\Province',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 9,    
            'name'              => 'forem::pulsar.availabilities',
            'translateable'     => false,       
            'type'              => 'config',     
            'model'             => 'pulsar-forem.availabilities',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 10,    
            'name'              => 'forem::pulsar.academic_levels',
            'translateable'     => false,       
            'type'              => 'config',     
            'model'             => 'pulsar-forem.academic_levels',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 11,    
            'name'              => 'forem::pulsar.teacher_profiles',
            'translateable'     => false,       
            'type'              => 'config',     
            'model'             => 'pulsar-forem.profiles',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ],
        (object)[
            'id'                => 12,    
            'name'              => 'forem::pulsar.category',
            'translateable'     => false,       
            'type'              => 'database',     
            'model'             => 'Syscover\Forem\Models\Category',                                      
            'package'           => 500,
            'option_id'         => 'id',
            'option_name'       => 'name'
        ], */
    ],
];