<?php namespace Quasar\Admin\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
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
}
