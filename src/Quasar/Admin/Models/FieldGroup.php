<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class FieldGroup
 * @package Quasar\Admin\Models
 */

class FieldGroup extends CoreModel
{
    protected $table        = 'admin_field_group';
    protected $fillable     = ['id', 'uuid', 'name', 'resource_uuid'];
    public $with            = ['resource'];

    public function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_uuid', 'uuid');
    }
}
