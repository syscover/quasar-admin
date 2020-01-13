<?php

return [
    //******************************************************************************************************************
    //***   Base lang, set main application language
    //******************************************************************************************************************
    'base_lang' => env('ADMIN_BASE_LANG', 'en'),

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
];