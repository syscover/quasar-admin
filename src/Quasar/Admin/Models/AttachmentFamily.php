<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class AttachmentFamily
 * @package Quasar\Admin\Models
 */

class AttachmentFamily extends CoreModel
{
    protected $table        = 'admin_attachment_family';
    protected $fillable     = ['uuid', 'name', 'width', 'height', 'fitTypeUuid', 'sizes', 'quality', 'format'];
    public $with            = ['resources'];
    protected $casts        = [
        'sizes' => 'array'
    ];

    public function resources()
    {
        return $this->belongsToMany(
            Resource::class,
            'admin_attachment_families_resources',
            'attachment_family_uuid',
            'resource_uuid',
            'uuid',
            'uuid'
        );
    }
}
