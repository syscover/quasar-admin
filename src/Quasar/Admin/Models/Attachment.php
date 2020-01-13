<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Attachment
 * @package Quasar\Admin\Models
 */

class Attachment extends CoreModel
{
    protected $table        = 'admin_attachment';
    protected $fillable     = ['uuid', 'commonUuid', 'langUuid', 'attachableType', 'attachableUuid', 'familyUuid', 'sort', 'alt', 'title', 'pathname', 'filename', 'url', 'mime', 'extension', 'size', 'width', 'height', 'libraryUuid', 'libraryFilename', 'dataLang', 'data'];
    protected $casts        = [
        'data' => 'array'
    ];
    public $with            = ['family', 'library'];

    public function family()
    {
        return $this->belongsTo(AttachmentFamily::class, 'family_uuid', 'uuid');
    }

    public function library()
    {
        return $this->hasOne(AttachmentLibrary::class, 'uuid', 'library_uuid');
    }
}
