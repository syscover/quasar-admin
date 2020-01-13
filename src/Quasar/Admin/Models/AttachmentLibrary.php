<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class AttachmentLibrary
 * @package Quasar\Admin\Models
 */

class AttachmentLibrary extends CoreModel
{
    protected $table        = 'admin_attachment_library';
    protected $fillable     = ['uuid', 'name', 'pathname','filename', 'url', 'mime', 'extension','size', 'width', 'height', 'data'];
    protected $casts        = [
        'data' => 'array'
    ];
}
