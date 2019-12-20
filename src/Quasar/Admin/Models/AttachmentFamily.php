<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class AttachmentFamily
 * @package Quasar\Admin\Models
 */

class AttachmentFamily extends CoreModel
{
    protected $table        = 'admin_attachment_family';
    protected $fillable     = ['id', 'uuid', 'resourceUuid', 'name', 'width', 'height', 'fitType', 'sizes', 'quality', 'format'];
    public $with            = ['resource'];
    protected $casts        = [
        'sizes' => 'array'
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_uuid', 'uuid');
    }
}
