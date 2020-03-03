<?php

// TODO: Add security to upload file form attachment component
Route::group(['prefix' => 'api/v1', 'middleware' => ['api']], function () 
{
    // Attachments
    Route::post('admin/attachment/upload',                           'Quasar\Admin\Controllers\AttachmentController@upload')->name('quasar.admin_attachment.upload');
    Route::post('admin/attachment/upload/crop',                      'Quasar\Admin\Controllers\AttachmentController@crop')->name('quasar.admin_attachment.crop');
    Route::post('admin/attachment/upload/delete',                    'Quasar\Admin\Controllers\AttachmentController@delete')->name('quasar.admin_attachment.delete');

    // Froala Wysiwyg
    Route::post('admin/froala/upload',                               'Quasar\Admin\Controllers\AttachmentController@froalaUpload')->name('quasar.admin_attachment.froala_upload');
});

Route::group(['middleware' => ['api']], function () 
{
    // Packages
    Route::get('admin/package',                                     'Quasar\Admin\Controllers\PackageController@get')->name('quasar.admin.package.get');
    Route::get('admin/package/find',                                'Quasar\Admin\Controllers\PackageController@find')->name('quasar.admin.package.find');
    Route::post('admin/package',                                    'Quasar\Admin\Controllers\PackageController@create')->name('quasar.admin.package.create');
    Route::put('admin/package',                                     'Quasar\Admin\Controllers\PackageController@update')->name('quasar.admin.package.update');
    Route::delete('admin/package',                                  'Quasar\Admin\Controllers\PackageController@delete')->name('quasar.admin.package.delete');
});