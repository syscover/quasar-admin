<?php namespace Quasar\Admin\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManagerStatic as Image;
use Quasar\Admin\Services\AttachmentService;

class AttachmentController extends BaseController
{
    public function upload(Request $request)
    {
        $files = $request->file('files');

        $tmpAttachmentsLibrary  = AttachmentService::storeAttachmentsLibraryTmp($files);
        $tmpAttachments         = AttachmentService::storeAttachmentsTmp($tmpAttachmentsLibrary);

        $response['status'] = 'success';
        $response['data'] = [
            'tmpAttachmentsLibraryTmp'     => $tmpAttachmentsLibrary,
            'tmpAttachments'               => $tmpAttachments
        ];

        return response()->json($response);
    }

    public function froalaUpload(Request $request) 
    {
        $files = $request->file('file');

        // save file in tmp folder
        $tmpAttachmentsLibrary = AttachmentService::storeAttachmentsLibraryTmp($files);

        // create response
        $response['link']   = Arr::first($tmpAttachmentsLibrary)['url'];
        $response['image']  = Arr::first($tmpAttachmentsLibrary);

        return response()->json($response);
    }
}
