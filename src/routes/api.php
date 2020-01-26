<?php

// TODO: Add security to upload file form attachment component
Route::group(['prefix' => 'api/v1', 'middleware' => ['api']], function () 
{
    // Attachments
    Route::post('admin/attachment/upload',                           'Quasar\Admin\Controllers\AttachmentController@upload')->name('quasar.admin_attachment.upload');
    Route::post('admin/attachment/upload/crop',                      'Quasar\Admin\Controllers\AttachmentController@crop')->name('quasar.admin_attachment.crop');
    Route::post('admin/attachment/upload/delete',                    'Quasar\Admin\Controllers\AttachmentController@delete')->name('quasar.admin_attachment.delete');
});