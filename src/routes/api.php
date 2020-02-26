<?php

// TODO: Add security to upload file form attachment component
Route::group(['prefix' => 'api/v1', 'middleware' => ['api']], function () 
{
    // Attachments
    Route::post('admin/attachment/upload',                           'Quasar\Admin\Controllers\AttachmentController@upload')->name('quasar.admin_attachment.upload');
    Route::post('admin/attachment/upload/crop',                      'Quasar\Admin\Controllers\AttachmentController@crop')->name('quasar.admin_attachment.crop');
    Route::post('admin/attachment/upload/delete',                    'Quasar\Admin\Controllers\AttachmentController@delete')->name('quasar.admin_attachment.delete');
});

Route::group(['middleware' => ['api']], function () 
{
    // Packages
    Route::get('admin/package',                                         'Quasar\Admin\Controllers\PackageController@get')->name('api.admin.package.get');
    Route::get('admin/package/find',                                    'Quasar\Admin\Controllers\PackageController@find')->name('api.admin.package.find');
    Route::post('admin/package',                                        'Quasar\Admin\Controllers\PackageController@create')->name('api.admin.package.create');
    Route::put('admin/package',                                         'Quasar\Admin\Controllers\PackageController@update')->name('api.admin.package.update');
    Route::delete('admin/package',                                      'Quasar\Admin\Controllers\PackageController@delete')->name('api.admin.package.delete');
});